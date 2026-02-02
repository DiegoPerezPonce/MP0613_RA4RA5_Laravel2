<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmActorSeeder extends Seeder
{
    public function run()
    {
        $filmIds = DB::table('films')->pluck('id')->toArray();
        $actorIds = DB::table('actors')->pluck('id')->toArray();

        foreach ($filmIds as $filmId) {
            // Cada película tiene entre 1 y 3 actores aleatorios
            $numActors = rand(1, 3);
            $selectedActors = (array)array_rand(array_flip($actorIds), $numActors);

            foreach ($selectedActors as $actorId) {
                DB::table('film_actor')->insert([
                    'film_id' => $filmId,
                    'actor_id' => $actorId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
