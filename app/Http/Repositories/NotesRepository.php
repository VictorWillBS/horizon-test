<?php

namespace App\Http\Repositories;

use App\Models\Notes;

class NotesRepository
{

    public function create(array $notesData)
    {
        $notes = new Notes();
        $notes->wave_id = $notesData["wave_id"];
        foreach ($notesData["notes"] as $index => $note) {
            $key = "note_" . $index + 1;
            $notes->$key = $note;
        }
        $notes->save();
        return $notes;
    }

    public function findByWaveId(int $waveId)
    {
        $notes = Notes::where("wave_id", $waveId)->first();
        return $notes;
    }
}
