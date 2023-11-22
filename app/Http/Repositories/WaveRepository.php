<?php

namespace App\Http\Repositories;

use App\Models\Battery;
use App\Models\Wave;
use Illuminate\Contracts\Database\Query\Builder;

class WaveRepository
{
    public function create(array $newWave)
    {
        $wave = Wave::create($newWave);
        return $wave;
    }
    public function findBatteryByIdAndSurferNumber(array $newWave)
    {
        $battery = Battery::where("id", $newWave["battery_id"])
            ->where(function ($query) use ($newWave) {
                $query->where("surfer_1", $newWave["surfer_number"])
                    ->orWhere("surfer_2", $newWave["surfer_number"]);
            })->first();
        return $battery;
    }
}
