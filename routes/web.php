<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Rutas con validación de año (solo estas usan el middleware)
|--------------------------------------------------------------------------
*/

Route::middleware('year')->group(function () {
    Route::prefix('filmout')->group(function () {

        // Rutas que SÍ usan un parámetro {year}
        Route::get('oldFilms/{year?}', [FilmController::class, "listOldFilms"])->name('oldFilms');
        Route::get('newFilms/{year?}', [FilmController::class, "listNewFilms"])->name('newFilms');

        // Nueva ruta filtrada por año
        Route::get('filmsByYear/{year}', [FilmController::class, "listFilmsByYear"])
            ->name('filmsByYear');
    });
});

/*
|--------------------------------------------------------------------------
| Rutas que NO usan year → NO deben pasar por el middleware
|--------------------------------------------------------------------------
*/

Route::prefix('filmout')->group(function () {

    // Filtrar por género
    Route::get('filmsByGenre/{genre}', [FilmController::class, "listFilmsByGenre"])
        ->name('filmsByGenre');

    // Contador de películas
    Route::get('countFilms', [FilmController::class, 'countFilms'])
        ->name('countFilms');

    // Ordenar películas
    Route::get('sortFilms', [FilmController::class, 'sortFilms'])
        ->name('sortFilms');

    // Ruta original completa sin middleware
    Route::get('films/{year?}/{genre?}', [FilmController::class, 'listFilms'])
        ->name('listFilms');
});

Route::prefix('actorout')->group(function () {
    
    // FR1: List actors
    Route::get('actors', [ActorController::class, 'listActors'])->name('actors');
});

Route::group(['prefix' => 'filmin'], function () {
    Route::post(
        'film',
        [FilmController::class, 'createFilm']
    )->middleware('validate.url')->name('film');
});

