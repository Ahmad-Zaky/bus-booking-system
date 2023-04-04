<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TripStoreRequest;
use App\Http\Requests\TripUpdateRequest;
use App\Http\Resources\Trip\{TripCollection, TripResource};
use App\Models\Trip;
use Illuminate\Http\JsonResponse;
use Throwable;

class TripController extends Controller
{
    public function index(): TripCollection
    {
        try { return new TripCollection(Trip::paginate()); }
        
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

    public function store(TripStoreRequest $request): TripResource|JsonResponse
    {
        try { return new TripResource(Trip::_create($request->validated())); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function update(TripUpdateRequest $request, Trip $trip): TripResource|JsonResponse
    {
        try { return new TripResource($trip->_update($request->validated())); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function destroy(Trip $trip): TripResource|JsonResponse
    {
        try { return new TripResource($trip->_destroy()); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }
}
