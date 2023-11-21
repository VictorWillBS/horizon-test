<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battery extends Model
{
    use HasFactory;

    protected $fillable = ["surfer_1", "surfer_2"];

    public function waves()
    {
        return $this->hasMany(Wave::class, "battery_id", "id");
    }
}
