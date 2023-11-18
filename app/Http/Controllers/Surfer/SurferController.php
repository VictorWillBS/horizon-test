<?php

namespace App\Http\Controllers\Surfer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSurfer;
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

    public function create(CreateSurfer $request)
    {
        try {
            $validatedData = $request->validated();
            $surfer = $this->surferService->createSurfer($validatedData);
            return response()->json(["status" => "created", "surfer" => $surfer], 201);
        } catch (\Throwable $th) {
            return $this->getErrorResponse($th);
        }
    }
}
