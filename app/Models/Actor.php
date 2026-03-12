<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    public function listActors()
    {
        $actors = Actor::all();

        return view('actors.list', compact('actors'));
    }
}
