<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusUpdateRequest extends FormRequest
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
        return [
            "number" => "integer|unique:buses,number,{$this->bus->id}",
            "plate_number" => "string|unique:buses,plate_number,{$this->bus->id}",
            "capacity" => "integer|min:12",
            "seats" => "required|array|size:{$this->capacity}",
            "seats.*.number" => "required|distinct:strict",
            "seats.*.order" => "required|distinct:strict",
        ];
    }
}
