<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Trip\{TripCollection, TripResource};
use App\Models\Trip;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class TripController extends Controller
{
    public function index(Request $request): TripCollection
    {
        try { return new TripCollection(Trip::query()->filter($request)->paginate()); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function show(Trip $trip): TripResource|JsonResponse
    {
        try { return new TripResource($trip); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }
}
