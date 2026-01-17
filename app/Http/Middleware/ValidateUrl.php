<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateUrl
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $imgUrl = $request->input('img_url');

        // Validar si la URL es una URL válida
        if (!filter_var($imgUrl, FILTER_VALIDATE_URL)) {
            return redirect('/')
                ->with('error', 'La URL de la imagen no es válida.');
        }

        return $next($request);
    }
}