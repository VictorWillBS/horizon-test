<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    public function wave()
    {
        return $this->belongsTo(Wave::class, "id", "wave_id");
    }
}
