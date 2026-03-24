<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    /**
     * Relación N:M - Una película tiene muchos actores.
     */
    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }
}