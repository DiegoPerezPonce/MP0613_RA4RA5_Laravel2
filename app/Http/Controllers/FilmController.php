<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class FilmController extends Controller
{
    /**
     * Read films from storage
     */
    public static function readFilms(): array
    {
        $films = Storage::json('/public/films.json');
        return $films;
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {
        $old_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */

    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            } else if ((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            } else if (!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x categoria y año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function listFilmsByYear($year)
    {
        $films_filtered = [];
        $title = "Listado de pelis filtradas por año ($year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] == $year) {
                $films_filtered[] = $film;
            }
        }

        return view("films.list", [
            "films" => $films_filtered,
            "title" => $title
        ]);
    }

    public function listFilmsByGenre($genre)
    {
        $films_filtered = [];
        $title = "Listado de pelis filtradas por categoría ($genre)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if (strtolower($film['genre']) == strtolower($genre)) {
                $films_filtered[] = $film;
            }
        }

        return view("films.list", [
            "films" => $films_filtered,
            "title" => $title
        ]);
    }

    public function countFilms()
    {
        $films = FilmController::readFilms();
        $count = count($films);
        $title = "Total de Películas";

        return view('films.count', [
            "title" => $title,
            "count" => $count
        ]);
    }

    public function sortFilms()
    {
        $films = FilmController::readFilms();
        $title = "Listado de Películas Ordenadas por Año (Descendente)";

        // Orden descendente => las más nuevas primero
        usort($films, function ($a, $b) {
            return $b['year'] <=> $a['year'];
        });

        return view('films.list', [
            "films" => $films,
            "title" => $title
        ]);
    }
    //
    public function isFilm(string $name): bool
    {
        $films = self::readFilms();

        foreach ($films as $film) {
            if (strtolower($film['name']) === strtolower($name)) {
                return true;
            }
        }

        return false;
    }

    //
    public function createFilm(Request $request)
    {
        // Comprobar si la película ya existe
        if ($this->isFilm($request->name)) {
            return redirect('/')
                ->with('error', 'La película ya existe.');
        }

        // Leer películas actuales
        $films = self::readFilms();

        // Añadir nueva película
        $films[] = [
            'name'     => $request->name,
            'year'     => (int) $request->year,
            'genre'    => $request->genre,
            'country'  => $request->country,
            'duration' => $request->duration,
            'img_url'  => $request->img_url,
        ];

        // Guardar en JSON
        Storage::put(
            '/public/films.json',
            json_encode($films, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        // Mostrar listado completo
        return view('films.list', [
            'films' => $films,
            'title' => 'Listado de todas las películas'
        ]);
    }
}
