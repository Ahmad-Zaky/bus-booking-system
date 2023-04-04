<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        "estimated_time",
        "parent_id",
        "governrate_id",
        "trip_id",
    ];

    protected $appends = ["estimated_arrival_at"];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'estimated_time' => 'integer', // Estimated time in minutes.
    ];

    public function governrate() {
        return $this->belongsTo(Governrate::class);
    }

    public function trip() {
        return $this->belongsTo(Trip::class);
    }

    public function prevStation() {
        return $this->belongsTo(Station::class, "parent_id")->with("prevStation");
    }

    public function nextStation() {
        return $this->hasOne(Station::class, "parent_id")->with("nextStation");
    }

    public function getPrevStationsAttribute()
    {
        return collect(flatPrevStations($this));
    }

    public function getNextStationsAttribute()
    {
        return collect(flatNextStations($this));
    }

    public function getLastStationAttribute() {
        return $this->nextStations->last();
    }

    public function getFirstStationAttribute() {
        return $this->prevStations->last();
    }

    public function getEstimatedArrivalAtAttribute()
    {
        $totalEstimatedTime = $this->prevStations->sum("estimated_time");

        if ($departureAt = $this->trip->departure_at) {
            return addMinutes($departureAt, $totalEstimatedTime);
        }

        return collect(flatPrevStations($this));
    }

    public static function _attach(Trip $trip, array $stations) 
    {
        $trip->stations()->delete();

        $parent = NULL;
        foreach (
            collect($stations)->sortBy("order")->toArray() as $station
        ) {
            $station["parent_id"] = $parent;
            $newStation = $trip->stations()->create($station);
            $parent = $newStation->id;
        }

        return true;
    }
}
