<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        "amount",
        "status",
        "notes",
        "trip_id",
        "user_id",
        "seat_id",
    ];
        
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'amount' => 'float',
        'status' => 'integer',
    ];

    public function trip() {
        return $this->belongsTo(Trip::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function seat() {
        return $this->belongsTo(Seat::class);
    }
}
