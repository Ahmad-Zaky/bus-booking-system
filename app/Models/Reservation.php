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
        "from_station_id",
        "to_station_id",
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

    public function fromStation() {
        return $this->belongsTo(Station::class, "from_station_id");
    }

    public function toStation() {
        return $this->belongsTo(Station::class, "to_station_id");
    }

    public function trip() {
        return $this->belongsTo(Trip::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function seat() {
        return $this->belongsTo(Seat::class);
    }

    public function scopeFilter($q, $request) 
    {
        $q
            ->when($request->from && $request->to, function ($q) use ($request) {
                return compareFromAndTo($q, "created_at", $request->from, $request->to);
            })
            ->when($request->from && ! $request->to, function ($q) use ($request) {
                return compareFrom($q, "created_at", $request->from);
            })
            ->when(! $request->from && $request->to, function ($q) use ($request) {
                return compareTo($q, "created_at", $request->to);
            });  
    }
    public static function _create($data)
    {
        return self::create($data);
    }

    public function _update($data)
    {
        $this->update($data);

        return $this;
    }

    public function _destroy()
    {
        $this->delete();

        return $this;
    }
}
