<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class YearMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // El año viene como parámetro en la ruta {year}
        $year = $request->route('year');

        // Validamos que sea un año permitido según el enunciado (1980 a 2020) 
        if ($year < 1980 || $year > 2020 || ($year % 10 !== 0)) {
            return redirect('/')->with('error', 'Década no válida.');
        }

        return $next($request);
    }
}
