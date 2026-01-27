<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CinemaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Vaciar tabla (opcional pero recomendado en desarrollo)
        DB::table('cinema')->truncate();

        // Generamos 20 películas
        for ($i = 0; $i < 20; $i++) {
            DB::table('cinema')->insert([
                'name' => $faker->sentence(3),
                'year' => $faker->numberBetween(1950, 2025),
                'genre' => $faker->randomElement([
                    'Drama',
                    'Comedia',
                    'Acción',
                    'Ciencia ficción',
                    'Terror',
                    'Documental'
                ]),
                'country' => $faker->randomElement([
                    'Spain',
                    'United States',
                    'France',
                    'United Kingdom',
                    'Germany',
                    'Italy'
                ]),
                'duration' => $faker->numberBetween(70, 210),
                'img_url' => $faker->imageUrl(300, 450, 'movie', true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
