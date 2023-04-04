<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminResource;
use App\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Throwable;

class AuthController extends Controller
{
    public function profile(): AdminResource|JsonResponse
    {
        try { return new AdminResource(auth("admin")->user()); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function register(Request $request): JsonResponse
    {
        try {
            $validateAdmin = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            if ($validateAdmin->fails()) {
                return response()->json([
                    "status" => false,
                    'message' => 'validation error',
                    'errors' => $validateAdmin->errors()
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            return response()->json([
                "status" => true,
                "message" => __("Admin registered Successfully"),
                "token" => $admin->createToken("API TOKEN")->plainTextToken,
            ],Response::HTTP_OK);

        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => __("Failed to register"),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function login(Request $request): JsonResponse
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);
    
            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            \Illuminate\Auth\RequestGuard::class;
            
            if(! Admin::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => __('Email & Password does not match with our record.'),
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            
            return response()->json([
                "status" => true,
                "message" => __("Admin Logged In Successfully"),
                "token" => auth("admin")->user()->createToken('API TOKEN')->plainTextToken,
            ],Response::HTTP_OK);

        } catch (\Throwable $th) {
            dd($th->getMessage());
            return response()->json([
                "status" => false,
                "message" => __("Failed to login"),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function logout(): JsonResponse
    {
        auth("admin")->user()->tokens()->delete();

        return response()->json([
            "status" => true,
            "message" => __("Admin Logged out Successfully"),
        ],Response::HTTP_OK);
    }
}
