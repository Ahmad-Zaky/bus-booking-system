<?php

namespace Database\Seeders;

use App\Models\Governrate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class GovernrateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->truncate();
        
        $governrates = [];
        foreach (config("governrates") as $governrate) {
            $governrates[] = [
                "name" => $governrate,
                "code" => str_replace(" ", "_", strtolower($governrate)),
                "updated_at" => now(),
                "created_at" => now(),
            ];
        }
        
        DB::table((new Governrate)->getTable())->insert($governrates);
    }

    protected function truncate() 
    {
        Schema::disableForeignKeyConstraints();
        
        Governrate::truncate();

        Schema::enableForeignKeyConstraints();
    }
}
