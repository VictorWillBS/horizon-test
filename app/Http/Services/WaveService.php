<?php

namespace App\Http\Services;

use App\Exceptions\NotFound;
use App\Http\Repositories\WaveRepository;

class WaveService
{

    public WaveRepository $waveRepository;

    public function __construct(WaveRepository $waveRepository)
    {
        $this->waveRepository = $waveRepository;
    }
    public function create(array $newWaveData)
    {
        $batteryWhereSurferExists = $this->waveRepository->findBatteryByIdAndSurferNumber($newWaveData);
        if (!$batteryWhereSurferExists) {
            throw new NotFound("No found surfer in this battery ");
        }
        $newWave = $this->waveRepository->create($newWaveData);
        return $newWave;
    }
}
