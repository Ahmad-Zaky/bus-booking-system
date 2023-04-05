<?php

namespace App\Http\Resources\Trip\Seat;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SeatCollection extends ResourceCollection
{
    protected $trip;
    function __construct($resource, Trip $trip)
    {
        parent::__construct($resource);

        $this->trip = $trip;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "data" => SeatResource::collectionProvide($this->collection, ["trip" => $this->trip]),
        ];
    }
}
