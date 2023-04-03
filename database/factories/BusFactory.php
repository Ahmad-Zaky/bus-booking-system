<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bus>
 */
class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "number" => $this->faker->unique()->randomNumber(7, true),
            "plate_number" => $this->faker->unique()->bothify('#### ???'),
            "capacity" => 12,
        ];
    }
}
