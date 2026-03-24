<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    /**
     * Relación N:M - Un actor participa en muchas películas.
     */
    public function films()
    {
        // Al no especificar parámetros, Laravel busca la tabla 'actor_film' automáticamente
        return $this->belongsToMany(Film::class);
    }
}