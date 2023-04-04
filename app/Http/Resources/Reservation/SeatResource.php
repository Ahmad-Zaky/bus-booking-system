<?php

namespace App\Http\Resources\Reservation;

use App\Http\Resources\Seat\BusResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeatResource extends JsonResource
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
            "order" => $this->order,
            "bus" => new BusResource($this->bus),
        ];
    }
}
