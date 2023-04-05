<?php

namespace App\Http\Resources\User\Reservation;

use App\Http\Resources\Reservation\SeatResource;
use App\Http\Resources\Reservation\StationResource;
use App\Http\Resources\Reservation\TripResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "amount" => $this->amount,
            "status" => $this->status,
            "notes" => $this->notes,
            "from_station" => new StationResource($this->fromStation),
            "to_station" => new StationResource($this->toStation),
            "trip" => new TripResource($this->trip),
            "seat" => new SeatResource($this->seat),
        ];
    }
}
