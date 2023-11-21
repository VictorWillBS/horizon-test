<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wave extends Model
{
    use HasFactory;

    protected $fillable = ["surfer_number", "battery_id"];

    public function notes()
    {
        return $this->hasOne(Notes::class, "wave_id", "id");
    }
}
