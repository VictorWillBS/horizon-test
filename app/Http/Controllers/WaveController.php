<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWaveRequest;
use App\Http\Services\WaveService;
use App\Traits\ErrorHandler;

class WaveController extends Controller
{
    use ErrorHandler;
    public WaveService $waveService;

    public function __construct(WaveService $waveService)
    {
        $this->waveService = $waveService;
    }

    public function create(StoreWaveRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $wave = $this->waveService->create($validatedData);
            return response()->json(["wave" => $wave], 201);
        } catch (\Throwable $th) {
            return $this->getErrorResponse($th);
        }
    }
}
