<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmFakerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('films')->insert([
                'name' => $faker->sentence(3),
                'year' => $faker->numberBetween(1950, 2025),
                'genre' => $faker->randomElement(['Drama','Comedia','Acción','Ciencia ficción','Terror','Documental']),
                'country' => $faker->country,
                'duration' => $faker->numberBetween(60, 200),
                'img_url' => $faker->imageUrl(300, 450, 'movie', true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
