<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surfer extends Model
{
    use HasFactory;

    protected $fillable = ['number','name','country'];
}
