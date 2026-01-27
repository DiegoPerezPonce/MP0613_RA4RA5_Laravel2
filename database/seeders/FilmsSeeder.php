<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmsSeeder extends Seeder
{
    public function run()
    {
        // Creamos el objeto Faker
        $faker = Faker::create();

        // (Opcional) obtenemos el último id insertado
        $lastInsertedId = DB::table('films')->max('id') ?? 0;

        // Generamos 20 películas aleatorias
        for ($i = $lastInsertedId; $i < $lastInsertedId + 20; $i++) {

            DB::table('films')->insert([
                // NO es necesario poner el id si es autoincremental
                //'id' => $i + 1,
                'name' => $faker->sentence(3),
                'year' => $faker->numberBetween(1980, 2025),
                'genre' => $faker->randomElement([
                    'Drama',
                    'Comedia',
                    'Ciencia Ficción',
                    'Aventuras',
                    'Documental'
                ]),
                'img_url' => $faker->imageUrl(300, 450, 'movie', true),
                'country' => $faker->randomElement([
                    'United States',
                    'Spain',
                    'United Kingdom',
                    'France',
                    'Germany'
                ]),
                'duration' => $faker->numberBetween(60, 200),
                'created_at' => now()
            ]);
        }
    }
}
