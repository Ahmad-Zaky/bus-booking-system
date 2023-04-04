<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusStoreRequest;
use App\Http\Requests\BusUpdateRequest;
use App\Http\Resources\Bus\{BusCollection, BusResource};
use App\Models\Bus;
use Illuminate\Http\JsonResponse;
use Throwable;

class BusController extends Controller
{
    public function index(): BusCollection|JsonResponse
    {
        try { return new BusCollection(Bus::paginate()); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function show(Bus $bus): BusResource|JsonResponse
    {
        try { return new BusResource($bus); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function store(BusStoreRequest $request): BusResource|JsonResponse
    {
        try { return new BusResource(Bus::_create($request->validated())); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function update(BusUpdateRequest $request, Bus $bus): BusResource|JsonResponse
    {
        try { return new BusResource($bus->_update($request->validated())); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function destroy(Bus $bus): BusResource|JsonResponse
    {
        try { return new BusResource($bus->_destroy()); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }
}
