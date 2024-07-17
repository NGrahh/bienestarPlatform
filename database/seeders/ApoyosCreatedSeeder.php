<?php

namespace Database\Seeders;

use App\Models\Apoyos_created;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ApoyosCreatedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 4; $i++) {
            Apoyos_created::create([
                'appoiment_name' => $faker->sentence(3), //Nombre aleatorio del apoyo
                'appoiment_date_start' => $faker->dateTimeBetween('-1 years', 'now'), //Fecha apertura del apoyo
                'appoiment_date_end' => $faker->dateTimeBetween('now', '+1 years'), //Fecha fin del apoyo
            ]);
        }
    }
}