<?php

namespace App\Http\Services;

use App\Http\Repositories\BatteryRepository;
use Illuminate\Http\Request;

class BatteryService
{
    private BatteryRepository $batteryRepository;
    public function __construct(BatteryRepository $batteryRepository)
    {
        $this->batteryRepository = $batteryRepository;
    }

    public function create(array $req)
    {
        $newBattery = $this->batteryRepository->create($req);
        return  $newBattery;
    }
}
