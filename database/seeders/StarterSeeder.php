<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Governrate;
use App\Models\Reservation;
use App\Models\Seat;
use App\Models\Station;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class StarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Fresh DB
        Artisan::call('migrate:fresh');

        (new AdminSeeder)->run();
        (new GovernrateSeeder)->run();
        (new UserSeeder)->run();
        
        // Buses
        $buses = Bus::factory(10)->create();
        
        foreach ($buses as $bus) {
            // Seats
            $seats = Seat::factory(12)->create(["bus_id" => $bus]);
            foreach ($seats as $index => $seat) $seat->update([
                "number" => array_rand(array_flip(["a", "b"])) . $index,
                "order" => $index
            ]);

            // Trips
            $trip = Trip::factory()->create(["bus_id" => $bus]);
            
            // Stations
            $parent = NULL;
            $governrates = Governrate::take(rand(2, 6))->get();
            foreach ($governrates as $governrate) {
                $station = Station::factory()->create([
                    "parent_id" => $parent,
                    "trip_id" => $trip,
                    "governrate_id" => $governrate,
                ]);
                $parent = $station;
            }
            
            $count = $trip->stations->count();
            $startIndex = rand(0, ($count-2));
            $take = rand(1, ($count-$startIndex));
            $stations = $trip->stations->slice($startIndex, $take); // NOTE: sub 2 to not get the last station as the starting point

            // Reservations
            $seat = Seat::getAvailableSeat($trip);
            Reservation::factory()->create([
                "from_station_id" => $stations->first(),
                "to_station_id" => $stations->last(),
                "trip_id" => $trip,
                "user_id" => User::where("email", "me@email.com")->first(),
                "seat_id" => $seat,
            ]);

            foreach (User::factory(5)->create() as $user) {
                $seat = Seat::getAvailableSeat($trip);
                Reservation::factory()->create([
                    "from_station_id" => $stations->first(),
                    "to_station_id" => $stations->last(),
                    "trip_id" => $trip,
                    "user_id" => $user,
                    "seat_id" => $seat,
                ]);
            }
        }
    }
}
