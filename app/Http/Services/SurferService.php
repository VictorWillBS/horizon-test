<?php

namespace App\Http\Services;

use App\Exceptions\AlreadyExist;
use App\Http\Repositories\SurferRepository;
use App\Http\Requests\CreateSurfer as CreateSurferRequest;
use Exception;

class SurferService
{
    private SurferRepository $surferRepository;


    public function __construct(SurferRepository $surferRepository)
    {
        $this->surferRepository = $surferRepository;
    }

    public function createSurfer(array $newSurferData)
    {
        $surferRepository = $this->surferRepository;
        if ($surferRepository->find($newSurferData['number'])) {
            throw new AlreadyExist("Surfer");
        }
        $newSurfer = $surferRepository->create($newSurferData);
        return $newSurfer;
    }
}
