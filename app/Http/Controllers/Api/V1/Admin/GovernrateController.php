<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Resources\Governrate\GovernrateCollection;
use App\Models\Governrate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;

class GovernrateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try { return new GovernrateCollection(Governrate::query()->filter($request)->get()); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }
}
