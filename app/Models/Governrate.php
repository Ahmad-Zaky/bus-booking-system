<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governrate extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "code"
    ];

    public function stations() {
        return $this->hasMany(Station::class);
    }
}
