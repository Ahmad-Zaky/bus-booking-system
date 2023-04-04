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
    
    public static function _paginate() 
    {
        return self::with(["trips.stations", "seats"])->paginate();
    }

    public static function _create($data)
    {
        $bus = self::create($data);

        Seat::_attach($bus, $data["seats"]);

        return $bus;
    }

    public function _update($data)
    {
        $this->update($data);

        Seat::_attach($this, $data["seats"]);

        return $this;
    }

    public function _destroy()
    {
        $this->delete();

        return $this;
    }
}
