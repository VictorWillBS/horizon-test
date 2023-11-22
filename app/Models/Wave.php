<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wave extends Model
{
    use HasFactory;

    protected $fillable = ["surfer_number", "battery_id"];

    public function scores()
    {
        return $this->hasOne(Score::class, "wave_id", "id");
    }
    public function battery()
    {
        return $this->belongsTo(Battery::class);
    }
    public function surfer()
    {
        return $this->hasOne(Surfer::class, "number", "surfer_number");
    }
}
