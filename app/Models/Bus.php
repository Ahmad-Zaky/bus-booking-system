<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        "number",
        "plate_number",
        "capacity",
    ];
            
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'capacity' => 'integer',
    ];

    public function seats() {
        return $this->hasMany(Seat::class);
    }

    public function trips() {
        return $this->hasMany(Trip::class);
    }
}
