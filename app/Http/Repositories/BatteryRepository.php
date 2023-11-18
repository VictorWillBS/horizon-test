<?php

namespace App\Http\Repositories;

use App\Models\Battery;

class BatteryRepository
{
    public function create(array $newBattery)
    {
        $battery = Battery::create($newBattery["participants_numbers"]);
        return $battery;
    }
}
