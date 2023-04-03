<?php

namespace Database\Factories;

use App\Models\Bus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seat>
 */
class SeatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "number" =>  $this->faker->randomElement(['a', 'b']) . rand(1, 6),
            "order" => rand(1, 12),
            "bus_id" => Bus::factory(),
        ];
    }
}
