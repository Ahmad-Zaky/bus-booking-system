<?php

namespace App\Http\Requests;

use App\Rules\DuplicateUserReservationsRule;
use App\Rules\FutureTripsOnlyRule;
use App\Rules\IsAvailableSeatRule;
use App\Rules\SeatWithTripBusRule;
use App\Rules\StationWithTripRule;
use App\Rules\TripStatusRule;
use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => $this?->user_id ?? app("user")?->id,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "amount" => "required|numeric",
            "notes" => "string",
            "trip_id" => ["exists:trips,id", new FutureTripsOnlyRule, new TripStatusRule],
            "from_station_id" => ["exists:stations,id", new StationWithTripRule],
            "to_station_id" => ["exists:stations,id", "different:from_station_id", new StationWithTripRule],
            "user_id" => ["exists:users,id", new DuplicateUserReservationsRule],
            "seat_id" => ["exists:seats,id", new SeatWithTripBusRule, new IsAvailableSeatRule($this)],
        ];
    }
}
