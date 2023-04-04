<?php

namespace App\Http\Requests;

use App\Enums\TripStatusEnums;
use Illuminate\Foundation\Http\FormRequest;

class TripUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        // TODO: 1. validate bus_id with other trip on the same time
        // TODO: 2. validate stations

        return [
            "title" => "string",
            "status" => "required|in:". TripStatusEnums::implode(),
            "number" => "integer|unique:trips,number,{$this->trip->id}",
            "departure_at" => "date_format:Y-m-d H:i:s|after:yesterday",
            "estimated_arrival_at" => "date_format:Y-m-d H:i:s|after:departure_at",
            "bus_id" => "exists:buses,id",
        ];
    }
}
