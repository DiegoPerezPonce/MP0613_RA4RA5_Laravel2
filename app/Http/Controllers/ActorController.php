<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{
    //FR1
    public function listActors()
    {
        $actors = Actor::all(); // Trae todos los actores de la tabla "actors"

        return view('actors.list', compact('actors'));
        // compact('actors') pasa los datos a la vista
    }

    //FR2
    public function listActorsByDecade($year)
    {
        $start = $year . "-01-01";
        $end = ($year + 9) . "-12-31";

        // Consulta usando Eloquent
        $actors = \App\Models\Actor::whereBetween('birthdate', [$start, $end])->get();

        // Retornamos la vista con un título dinámico
        return view('actors.list', [
            'actors' => $actors,
            'title' => "Actores de la década: $year"
        ]);
    }

    //FR3 Count actors 
    public function countActors()
    {
        // Obtenemos el total directamente de la base de datos
        $totalActors = \App\Models\Actor::count();

        // Retornamos la vista 'count' pasando la variable
        return view('actors.count', ['count' => $totalActors]);
    }
}
