<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        "number",
        "type",
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
}
