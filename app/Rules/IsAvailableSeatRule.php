<?php

namespace App\Rules;

use App\Models\Trip;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class IsAvailableSeatRule implements DataAwareRule, ValidationRule
{
    /**
     * All of the data under validation.
     *
     * @var array<string, mixed>
     */
    protected $data = [];

    protected $request;
 
    function __construct($request)
    {
        $this->request = $request;
    }
    
    /**
     * Set the data under validation.
     *
     * @param  array<string, mixed>  $data
     */
    public function setData(array $data): static
    {
        $this->data = $data;
 
        return $this;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $trip = Trip::find($this->data["trip_id"] ?? NULL)) return;

        if (request()->method() === "PUT") {
            $reservations = $trip->reservations()
                ->whereNot("id", $this->request->reservation->id)
                ->get();

        } else { $reservations = $trip->reservations; }

        foreach ($reservations as $reservation) {
            if ($reservation->seat_id !== (int) $value) continue;
            $fromStation = $reservation->fromStation;
            $toStation = $reservation->toStation;
            
            $startIndex = $trip->sortedStations->pluck("id")->search($fromStation->id);
            $endIndex = $trip->sortedStations->pluck("id")->search($toStation->id);
            $stations = $trip->sortedStations->slice($startIndex, (($endIndex - $startIndex)+1));

            if (
                $stations->pluck("id")->contains($this->data["from_station_id"]) ||
                $stations->pluck("id")->contains($this->data["to_station_id"])
            ) { $fail(__("The :attribute has already been taken.")); }
        }
    }
}
