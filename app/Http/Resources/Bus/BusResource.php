<?php

namespace App\Http\Resources\Bus;

use App\Http\Resources\Bus\Seat\SeatCollection;
use App\Http\Resources\Bus\Trip\TripCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusResource extends JsonResource
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
            "number" => $this->number,
            "plate_number" => $this->plate_number,
            "capacity" => $this->capacity,
            "trips" => new TripCollection($this->trips),
            "seats" => new SeatCollection($this->seats),
        ];
    }
}
