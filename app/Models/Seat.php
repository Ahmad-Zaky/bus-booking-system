<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        "number",
        "order",
        "bus_id",
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'order' => 'integer',
    ];
    
    public function bus() {
        return $this->belongsTo(Bus::class);
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

    public static function _attach(Bus $bus, array $seats) 
    {
        $bus->seats()->delete();

        foreach ($seats as $seat) {
            $bus->seats()->create($seat);
        }

        return true;
    }

    public function isAvailable(Trip $trip) 
    {
        return ! $trip->reservations->pluck("seat_id")->contains($this->id);
    }
}
