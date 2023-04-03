<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "number",
        "departure_at",
        "estimated_arrival_at",
        "bus_id",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'departure_at' => 'datetime:Y-m-d H:i:s',
        'estimated_arrival_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function bus() {
        return $this->belongsTo(Bus::class);
    }

    public function stations() {
        return $this->hasMany(Station::class);
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}
