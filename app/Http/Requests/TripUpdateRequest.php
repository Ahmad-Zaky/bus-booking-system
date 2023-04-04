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

        return [
            "title" => "string",
            "status" => "integer|in:". TripStatusEnums::implode(),
            "number" => "integer|unique:trips,number,{$this->trip->id}",
            "departure_at" => "date_format:Y-m-d H:i:s|after:yesterday",
            "bus_id" => "exists:buses,id",
            "stations" => "required|array|min:2",
            "stations.*.estimated_time" => "required|integer",
            "stations.*.order" => "required|integer|distinct:strict",
            "stations.*.governrate_id" => "required|exists:governrates,id|distinct:strict",
        ];
    }
}
