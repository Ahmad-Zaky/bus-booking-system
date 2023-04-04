<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusStoreRequest extends FormRequest
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
            "number" => "required|integer|unique:buses,number",
            "plate_number" => "required|string|unique:buses,plate_number",
            "capacity" => "required|integer|min:12",
            "seats" => "required|array|size:{$this->capacity}",
            "seats.*.number" => "required|distinct:strict",
            "seats.*.order" => "required|distinct:strict",
        ];
    }
}
