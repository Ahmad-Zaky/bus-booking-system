<?php

namespace Database\Factories;

use App\Enums\TripStatusEnums;
use App\Models\Seat;
use App\Models\Station;
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
        $station = Station::factory()->parent()->create();

        
        $prevStation = $station->prevStation->parent_id = Station::factory()->create();
        $nextStation = $station;

        return [
            "amount" => $this->faker->randomNumber(3),
            "status" => $this->faker->randomElement(TripStatusEnums::values()),
            "notes" => $this->faker->sentence(),
            "from_station_id" => $prevStation,
            "to_station_id" => $nextStation,
            "trip_id" => Trip::factory(),
            "user_id" => User::factory(),
            "seat_id" => Seat::factory(),
        ];
    }
}
