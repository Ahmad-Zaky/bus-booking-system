<?php

namespace App\Http\Resources\Reservation;

use App\Http\Resources\Governrate\GovernrateResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // TODO: 1. Calculate estimated arrival time

        return [
            "id" => $this->id,
            "estimated_time" => $this->estimated_time, // Estimated time in minutes
            "estimated_arrival_at" => $this->estimated_arrival_at,
            "governrate" => new GovernrateResource($this->governrate),
        ];
    }
}
