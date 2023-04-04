<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Http\Requests\ReservationUpdateRequest;
use App\Http\Resources\Reservation\{ReservationCollection, ReservationResource};
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class ReservationController extends Controller
{
    public function index(Request $request): ReservationCollection|JsonResponse
    {
        try { return new ReservationCollection(Reservation::query()->filter($request)->paginate()); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function show(Reservation $reservation): ReservationResource|JsonResponse
    {
        try { return new ReservationResource($reservation); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function store(ReservationStoreRequest $request): ReservationResource|JsonResponse
    {
        try { return new ReservationResource(Reservation::_create($request->validated())); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function update(ReservationUpdateRequest $request, Reservation $reservation): ReservationResource|JsonResponse
    {
        try { return new ReservationResource($reservation->_update($request->validated())); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }

    public function destroy(Reservation $reservation): ReservationResource|JsonResponse
    {
        try { return new ReservationResource($reservation->_destroy()); }
        
        catch (Throwable $th) {
            return $this->handleInternalErrorResponse($th);
        }
    }
}
