<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotesRequest;
use App\Http\Requests\UpdateNotesRequest;
use App\Http\Services\NotesService;
use App\Models\Notes;
use App\Traits\ErrorHandler;

class NotesController extends Controller
{

    use ErrorHandler;

    public NotesService $notesService;

    public function __construct(NotesService $notesService)
    {
        $this->notesService = $notesService;
    }


    public function create(StoreNotesRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $notes = $this->notesService->create($validatedData);
            return response()->json(["notes" => $notes], 201);
        } catch (\Throwable $th) {
            return $this->getErrorResponse($th);
        }
    }
}
