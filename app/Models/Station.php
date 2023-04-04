<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        "estimated_time",
        "is_start",
        "is_destination",
        "parent_id",
        "governrate_id",
        "trip_id",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'estimated_time' => 'integer', // Estimated time in minutes.
        'is_start' => 'boolean',
        'is_destination' => 'boolean',
    ];

    public function prevStation() {
        return $this->belongsTo(Station::class, "parent_id");
    }

    public function nextStation() {
        return $this->hasOne(Station::class, "parent_id");
    }

    public function governrate() {
        return $this->belongsTo(Governrate::class);
    }

    public function trip() {
        return $this->belongsTo(Trip::class);
    }
}
