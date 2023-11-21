<?php

namespace App\Http\Repositories;

use App\Models\Battery;
use App\Models\Notes;
use App\Models\Wave;
use Illuminate\Support\Facades\DB;

class BatteryRepository
{

    public function create(array $newBattery)
    {
        $battery = Battery::create($newBattery["participants_numbers"]);
        return $battery;
    }
    public function getBatteryWaves(int $id)
    {
        $waves = Wave::where("battery_id", $id)->with(["notes", "surfer"])->get();
        return $waves;
    }
}
