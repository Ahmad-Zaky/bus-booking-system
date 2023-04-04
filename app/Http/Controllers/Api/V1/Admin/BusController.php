<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusStoreRequest;
use App\Http\Requests\BusUpdateRequest;
use App\Http\Resources\BusCollection;
use App\Http\Resources\BusResource;
use App\Models\Bus;
use Throwable;

class BusController extends Controller
{
    public function index() 
    {
        try { return new BusCollection(Bus::paginate()); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function show(Bus $bus) 
    {
        try { return new BusResource($bus); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function store(BusStoreRequest $request)
    {
        try { return new BusResource(Bus::_create($request->validated())); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function update(BusUpdateRequest $request, Bus $bus) 
    {
        try { return new BusResource($bus->_update($request->validated())); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function destroy(Bus $bus) 
    {
        try { return new BusResource($bus->_destroy()); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }
}
