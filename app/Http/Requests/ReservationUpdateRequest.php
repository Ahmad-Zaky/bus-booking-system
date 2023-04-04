<?php

namespace App\Http\Requests;

use App\Enums\ReservationStatusEnums;
use Illuminate\Foundation\Http\FormRequest;

class ReservationUpdateRequest extends FormRequest
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
        // TODO: 1. validate that seat is related to bus which is respectively related to the trip reservation.
        // TODO: 2. validate prevent duplicate reservations for the same user on the same trip.

        return [
            "amount" => "required|numeric",
            "status" => "required|in:". ReservationStatusEnums::implode(),
            "notes" => "string",
            "from_station_id" => "exists:stations,id",
            "to_station_id" => "exists:stations,id|different:from_station_id",
            "trip_id" => "exists:trips,id",
            "user_id" => "exists:users,id",
            "seat_id" => "exists:seats,id",
        ];
    }
}
