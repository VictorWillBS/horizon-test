<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSurferRequest;
use App\Http\Services\SurferService;
use App\Traits\ErrorHandler;
use Illuminate\Http\Request;

class SurferController extends Controller
{
    use ErrorHandler;

    private SurferService $surferService;
    public function __construct(SurferService $surferService)
    {
        $this->surferService = $surferService;
    }

    public function create(StoreSurferRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $surfer = $this->surferService->createSurfer($validatedData);
            return response()->json(["status" => "created", "surfer" => $surfer], 201);
        } catch (\Throwable $th) {
            return $this->getErrorResponse($th);
        }
    }
    public function getAll()
    {
        try {
            $allSurfers = $this->surferService->getAllSurfers();
            return response()->json(["surfer" => $allSurfers], 200);
        } catch (\Throwable $th) {
            return $this->getErrorResponse($th);
        }
    }
}
