<?php

namespace App\Http\Services;

use App\Exceptions\AlreadyExist;
use App\Http\Repositories\NotesRepository;

class NotesService
{

    public NotesRepository $notesRepository;

    public function __construct(NotesRepository $notesRepository)
    {
        $this->notesRepository = $notesRepository;
    }

    public function create(array $notesData)
    {
        $alreadyExists = $this->notesRepository->findByWaveId($notesData["wave_id"]);
        if (isset($alreadyExists)) {
            $message = "Notes to wave " . $notesData["wave_id"];
            throw new AlreadyExist($message);
        }

        $notes = $this->notesRepository->create($notesData);
        return $notes;
    }
}
