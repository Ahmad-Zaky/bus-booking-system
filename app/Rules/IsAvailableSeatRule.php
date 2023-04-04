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
 
    // ...
 
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
        if (request()->method() === "PUT") {
            if (
                Trip::find($this->data["trip_id"])
                    ?->reservations()
                    ->whereNot("seat_id", $value)
                    ->pluck("seat_id")
                    ->contains($value)
            ) { $fail(__("The :attribute has already been taken.")); }

            return;
        }

        if (
            Trip::find($this->data["trip_id"])
                ?->reservations()
                ->pluck("seat_id")
                ->contains($value)
        ) { $fail(__("The :attribute has already been taken.")); }
    }
}
