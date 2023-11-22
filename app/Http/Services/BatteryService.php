<?php

namespace App\Http\Services;

use App\Exceptions\NotFound;
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
    public function getWinner(int $id)
    {
        $waves = $this->batteryRepository->getBatteryWaves($id);
        if ($waves->isEmpty()) {
            throw new NotFound("No waves founded in this battery.");
        }

        $surfers = $this->getSurfersScores($waves);
        $potentialWinner = $this->compareSurfersScores($surfers);

        if (count($potentialWinner) > 1) {
            return ["battery_status" => "Draw", "surfers" => $potentialWinner];
        }
        return ["battery_status" => "Victory", "surfers" => $potentialWinner];
    }

    protected function getSurfersScores($waves)
    {
        foreach ($waves as $wave) {
            if (!$wave->scores) {
                throw new NotFound("wave " . $wave->id . " has no scores.");
            }
            $scores = $wave->scores;
            $surfers[$wave->surfer->number]['surfer'] = $wave->surfer;

            $avg = calculateAverage([$scores->score_1, $scores->score_2, $scores->score_3]);
            $surfers[$wave->surfer->number]['scores'][] =  $avg;
            rsort($surfers[$wave->surfer_number]['scores']);

            $surfers[$wave->surfer_number]['finalScore'] = $this->getSurferFinalScore($surfers[$wave->surfer->number]['scores']);
        }
        return $surfers;
    }
    protected function getSurferFinalScore($scores)
    {
        $greaterScorer = $scores[0] ?? 0;
        $secondgreaterScorer = $scores[1] ?? 0;
        $finalAverage = calculateAverage([$greaterScorer, $secondgreaterScorer]);
        return  $finalAverage;
    }
    protected function compareSurfersScores($surfers)
    {
        $potentialWinner = null;
        $greaterScore = 0;

        foreach ($surfers as $surfer) {
            if ($surfer["finalScore"] > $greaterScore) {
                $greaterScore = $surfer["finalScore"];
                $potentialWinner = [$surfer];
            } else if ($surfer["finalScore"] == $greaterScore) {
                $potentialWinner = [$potentialWinner, $surfer];
            }
        }
        return $potentialWinner;
    }
}
