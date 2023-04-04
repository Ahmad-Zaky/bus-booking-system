<?php

namespace App\Http\Resources\Governrate;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GovernrateCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "data" => GovernrateResource::collection($this->collection),
        ];
    }
}
