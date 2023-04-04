<?php

use App\Enums\TripStatusEnums;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            
            $table->string("title")->nullable();
            $table->string("number");
            $table->tinyInteger("status")->default(TripStatusEnums::WAITING);

            $table->timestamp("departure_at");
            $table->timestamp("estimated_arrival_at")->nullable();
            
            $table->foreignId('bus_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
