<?php

namespace Database\Factories;

use App\Enums\TripStatusEnums;
use App\Models\Bus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departure_at = $this->faker->dateTimeBetween("+1 days", "+30 days")->format("Y-m-d H:i:s");
        
        $estimatedArrivalAt = addHours($departure_at, rand(1, 9));

        return [
            "title" => $this->faker->sentence(),
            "number" => $this->faker->unique()->randomNumber(8, true),
            "status" => $this->faker->randomElement(TripStatusEnums::values()),
            "departure_at" => $departure_at,
            "estimated_arrival_at" => $estimatedArrivalAt,
            "bus_id" => Bus::factory(),
        ];
    }
}
