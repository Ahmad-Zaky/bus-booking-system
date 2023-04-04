<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripStoreRequest extends FormRequest
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
            "number" => "required|unique:trips,number",
            "departure_at" => "required|date_format:Y-m-d H:i:s",
            "estimated_arrival_at" => "date_format:Y-m-d H:i:s|after:departure_at",
            "bus_id" => "required|exists:buses,id",
        ];
    }
}
