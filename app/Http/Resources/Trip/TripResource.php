<?php

namespace App\Http\Resources\Trip;

use App\Http\Resources\Trip\Station\StationCollection;
use App\Http\Resources\Trip\BusResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
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
            "title" => $this->title,
            "number" => $this->number,
            "departure_at" => $this->departure_at->format(config("app.datetime_format")),
            "estimated_arrival_at" => $this->estimated_arrival_at->format(config("app.datetime_format")),
            "bus" => (new BusResource($this->bus))->provide(["trip" => $this->resource]),
            "stations" => new StationCollection($this->stations),
        ];
    }
}
