<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function handleInternalErrorResponse($th) 
    {
        report($th);

        return response()->json([
            'message' => __('Sorry we couldn\'t handle your Request please contact support')
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
