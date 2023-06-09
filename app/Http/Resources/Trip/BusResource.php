<?php

namespace App\Http\Resources\Trip;

use App\Http\Resources\ExtendedJsonResource;
use App\Http\Resources\Trip\Seat\SeatCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusResource extends ExtendedJsonResource
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
            "seats" => new SeatCollection($this->seats, $this->provide->trip),
        ];
    }
}
