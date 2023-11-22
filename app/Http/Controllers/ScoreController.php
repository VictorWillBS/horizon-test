<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScoreRequest;
use App\Http\Services\ScoreService;
use App\Traits\ErrorHandler;

class ScoreController extends Controller
{

    use ErrorHandler;

    public ScoreService $scoreService;

    public function __construct(ScoreService $scoreService)
    {
        $this->scoreService = $scoreService;
    }


    public function create(StoreScoreRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $score = $this->scoreService->create($validatedData);
            return response()->json(["score" => $score], 201);
        } catch (\Throwable $th) {
            return $this->getErrorResponse($th);
        }
    }
}
