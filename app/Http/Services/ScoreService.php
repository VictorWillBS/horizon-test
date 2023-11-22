<?php

namespace App\Http\Services;

use App\Exceptions\AlreadyExist;
use App\Http\Repositories\ScoreRepository;

class ScoreService
{

    public ScoreRepository $scoreRepository;

    public function __construct(ScoreRepository $scoreRepository)
    {
        $this->scoreRepository = $scoreRepository;
    }

    public function create(array $scoresData)
    {
        $alreadyExists = $this->scoreRepository->findByWaveId($scoresData["wave_id"]);
        if (isset($alreadyExists)) {
            $message = "scores to wave " . $scoresData["wave_id"];
            throw new AlreadyExist($message);
        }

        $scores = $this->scoreRepository->create($scoresData);
        return $scores;
    }
}
