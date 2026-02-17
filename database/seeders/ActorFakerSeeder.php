<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ActorFakerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('actors')->insert([
                'name'       => $faker->firstName,
                'surname'    => $faker->lastName,
                'alias'      => $faker->boolean(70) ? $faker->userName : null, // 70% chance de tener alias
                'birthdate'  => $faker->date('Y-m-d', '2000-01-01'),
                'country' => substr($faker->country, 0, 30),
                'img_url'    => $faker->imageUrl(300, 450, 'people', true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
