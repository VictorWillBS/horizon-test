<?php

namespace App\Http\Repositories;

use App\Models\Wave;

class WaveRepository
{
    public function create(array $newWave)
    {
        $wave = Wave::create($newWave);
        return $wave;
    }
}
