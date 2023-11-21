<?php

namespace App\Http\Services;

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
        $newWave = $this->waveRepository->create($newWaveData);
        return $newWave;
    }
}
