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
        // TODO: 2. renmae governrate to governorate in the codebase which is a typo

        return [
            "title" => "string",
            "number" => "required|unique:trips,number",
            "departure_at" => "required|date_format:Y-m-d H:i:s",
            "bus_id" => "required|exists:buses,id",
            "stations" => "required|array|min:2",
            "stations.*.estimated_time" => "required|integer",
            "stations.*.order" => "required|integer|distinct:strict",
            "stations.*.governrate_id" => "required|exists:governrates,id|distinct:strict",
        ];
    }
}
