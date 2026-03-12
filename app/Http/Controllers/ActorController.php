<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{
    public function listActors()
    {
        $actors = Actor::all(); // Trae todos los actores de la tabla "actors"

        return view('actors.list', compact('actors'));
        // compact('actors') pasa los datos a la vista
    }

    public function listActorsByDecade($year)
    {
        $startYear = $year;
        $endYear = $year + 9;

        $actors = Actor::whereYear('birthdate', '>=', $startYear)
            ->whereYear('birthdate', '<=', $endYear)
            ->get();

        return view('actors.list', compact('actors'));
    }
}
