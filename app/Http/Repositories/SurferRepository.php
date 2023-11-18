<?php

namespace App\Http\Repositories;

use App\Models\Surfer;

class SurferRepository
{

    public function create($newSurfer)
    {
        $surfer = Surfer::create($newSurfer);
        return $surfer;
    }

    public function find($number)
    {
        return Surfer::where('number', $number)->first();
    }
    public function findAll()
    {
        return Surfer::get();
    }
}
