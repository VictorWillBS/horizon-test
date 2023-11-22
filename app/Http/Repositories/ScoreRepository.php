<?php

namespace App\Http\Repositories;

use App\Models\Score;

class ScoreRepository
{

    public function create(array $scoreData)
    {
        $score = new Score();
        $score->wave_id = $scoreData["wave_id"];
        foreach ($scoreData["scores"] as $index => $partialScore) {
            $key = "score_" . $index + 1;
            $score->$key = $partialScore;
        }
        $score->save();
        return $score;
    }

    public function findByWaveId(int $waveId)
    {
        $score = Score::where("wave_id", $waveId)->first();
        return $score;
    }
}
