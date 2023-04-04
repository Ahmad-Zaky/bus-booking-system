<?php

namespace App\Http\Resources\Station;

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
            "governrate" => new GovernrateResource($this->governrate),
            "trip" => new TripResource($this->trip),
            "prevStation" => $this->prevStation ? [
                "id" => $this->prevStation->id,
                "governrate" => new GovernrateResource($this->prevStation->governrate)
            ] : NULL,
            "nextStation" => $this->nextStation ? [
                "id" => $this->nextStation->id,
                "governrate" => new GovernrateResource($this->nextStation->governrate)
            ] : NULL,
        ];
    }
}
