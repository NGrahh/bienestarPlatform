<?php

namespace Database\Seeders;

use App\Models\Apoyos_created;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ApoyosCreatedSeeder extends Seeder
{
    // /**
    //  * Run the database seeds.
    //  */
    // public function run(): void
    // {
    //     $faker = Faker::create();

    //     for ($i = 0; $i < 4; $i++) {
    //         Apoyos_created::create([
    //             'tipo_apoyo_id' => $faker->numberBetween(2, 5), // Genera un número aleatorio entre 1 y 5
    //             'appoiment_date_start' => $faker->dateTimeBetween('-1 years', 'now'), //Fecha apertura del apoyo
    //             'appoiment_date_end' => $faker->dateTimeBetween('now', '+1 years'), //Fecha fin del apoyo
    //         ]);
    //     }
    // }
}