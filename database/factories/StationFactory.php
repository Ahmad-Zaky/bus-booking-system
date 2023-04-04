<?php

namespace Database\Factories;

use App\Models\Governrate;
use App\Models\Station;
use App\Models\Trip;
use Database\Seeders\GovernrateSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TripSchedule>
 */
class StationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "estimated_time" => $this->faker->unique()->randomNumber(2),
            "parent_id" => NULL,
            "governrate_id" => $this->getGovernrate(),
            "trip_id" => Trip::factory(),
        ];
    }

    protected function getGovernrate() 
    {
        if (! Governrate::all()->random()) {
            (new GovernrateSeeder)->run();
        }

        return Governrate::all()->random();
    }

    /**
     * Indicate that the user is suspended.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function parent()
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => Station::factory()->create($attributes),
            ];
        });
    }
}
