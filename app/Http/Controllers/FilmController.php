<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    /**
     * Read films from storage
     */
    public static function readFilms(): array
    {
        //$films = Storage::json('/public/films.json');
        $films = Film::all();
         dd(vars:$films);
        return $films ?? [];
       
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
        $films = self::readFilms();

        foreach ($films as $film) {
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
        $films = self::readFilms();

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
        $films = self::readFilms();

        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            } 
            else if ((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            } 
            else if (!is_null($year) && !is_null($genre) 
                && strtolower($film['genre']) == strtolower($genre) 
                && $film['year'] == $year) {
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
        $films = self::readFilms();

        foreach ($films as $film) {
            if ($film['year'] == $year)
                $films_filtered[] = $film;
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
        $films = self::readFilms();

        foreach ($films as $film) {
            if (strtolower($film['genre']) == strtolower($genre))
                $films_filtered[] = $film;
        }

        return view("films.list", [
            "films" => $films_filtered,
            "title" => $title
        ]);
    }

    public function countFilms()
    {
        $films = self::readFilms();
        $count = count($films);
        $title = "Total de Películas";

        return view('films.count', [
            "title" => $title,
            "count" => $count
        ]);
    }

    public function sortFilms()
    {
        $films = self::readFilms();
        $title = "Listado de Películas Ordenadas por Año (Descendente)";

        usort($films, function ($a, $b) {
            return $b['year'] <=> $a['year'];
        });

        return view('films.list', [
            "films" => $films,
            "title" => $title
        ]);
    }

    public function isFilm(string $name): bool
    {
        $films = self::readFilms();

        foreach ($films as $film) {
            if (strtolower($film['name']) === strtolower($name))
                return true;
        }

        return false;
    }

    public function createFilm(Request $request)
    {
        // VALIDACIÓN SOLO DEL AÑO (1900-2024)
        $request->validate([
            'year' => 'required|integer|min:1900|max:2024',
        ]);

        // Comprobar si la película ya existe
        if ($this->isFilm($request->name)) {
            return redirect('/')
                ->with('error', 'La película ya existe.');
        }

        $films = self::readFilms();

        $films[] = [
            'name'     => $request->name,
            'year'     => (int) $request->year,
            'genre'    => $request->genre,
            'country'  => $request->country,
            'duration' => $request->duration,
            'img_url'  => $request->img_url,
        ];

        Storage::put(
            '/public/films.json',
            json_encode($films, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        return view('films.list', [
            'films' => $films,
            'title' => 'Listado de todas las películas'
        ]);
    }
}
