<?php

namespace Database\Factories;

use App\Enums\TripStatusEnums;
use App\Models\Seat;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "amount" => $this->faker->randomNumber(3),
            "status" => $this->faker->randomElement(TripStatusEnums::values()),
            "notes" => $this->faker->sentence(),
            "trip_id" => Trip::factory(),
            "user_id" => User::factory(),
            "seat_id" => Seat::factory(),
        ];
    }
}
