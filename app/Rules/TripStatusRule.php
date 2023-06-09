<?php

namespace App\Rules;

use App\Enums\TripStatusEnums;
use App\Models\Trip;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TripStatusRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $trip = Trip::find($value)) return;

        if (in_array(
                $trip->status,
                [TripStatusEnums::ARRIVED, TripStatusEnums::CANCELLED]
        )) { $fail(__('The :attribute has been arrived or canceled.')); }
    }
}
