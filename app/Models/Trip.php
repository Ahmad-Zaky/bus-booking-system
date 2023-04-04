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
        "status",
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
        'status' => 'integer',
        'departure_at' => 'datetime',
        'estimated_arrival_at' => 'datetime',
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

    public function scopeFilter($q, $request) 
    {
        $q
            ->when($request->search, function ($q, $search) {
                $q->where(fn($q) => 
                    $q
                        ->where("title", "like", "%{$search}%" )
                        ->orWhere("number", "like", "%{$search}%" )
                );
            })
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
