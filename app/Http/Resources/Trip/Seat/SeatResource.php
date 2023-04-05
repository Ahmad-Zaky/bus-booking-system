<?php

namespace App\Http\Resources\Trip\Seat;

use App\Http\Resources\ExtendedJsonResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeatResource extends ExtendedJsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // In case with comes from a collection not from resource
        if (parent::$collectionProvide) $this->provide = parent::$collectionProvide;

        return [
            "id" => $this->id,
            "number" => $this->number,
            "order" => $this->order,
            "is_available" => $this->resource->isAvailable($this->provide->trip),
        ];
    }
}
