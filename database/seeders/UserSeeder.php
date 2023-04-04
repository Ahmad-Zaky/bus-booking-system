<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Reservation;
use App\Models\Seat;
use App\Models\Station;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)
            ->has(
                Reservation::factory()
                    ->for(
                        Trip::factory()
                            ->has(
                                Station::factory(3)->parent()
                            )->for(
                                Bus::factory()->has(Seat::factory())
                            )
                    )
            )
            ->create();
    }
}
