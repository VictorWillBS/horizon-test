<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBatteryRequest;
use App\Http\Services\BatteryService;
use App\Traits\ErrorHandler;
use Illuminate\Http\Request;

class BatteryController extends Controller
{

    use ErrorHandler;

    private BatteryService $serviceBattery;

    public function __construct(BatteryService $serviceBattery)
    {
        $this->serviceBattery = $serviceBattery;
    }
    public function Create(StoreBatteryRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $newBattery =  $this->serviceBattery->create($validatedData);
            return response()->json(["status" => "created", "battery" => $newBattery], 201);
        } catch (\Throwable $th) {
            return $this->getErrorResponse($th);
        }
    }
}
