<?php

namespace Database\Seeders;

use App\Models\Apoyos;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class ApoyosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Crear varios usuarios con datos aleatorios
        for ($i = 0; $i < 4; $i++) {
            Apoyos::create([
                // 'user_id' => $faker->unique()->randomNumber(),
                'name' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'mobilenumber' => $faker->numerify('###########'),
                'formatuser' => $faker->imageUrl(400, 400, 'events', true), // URL de una imagen de evento
                'photocopy' => $faker->imageUrl(400, 400, 'events', true), // URL de una imagen de evento
                'receipt' => $faker->imageUrl(400, 400, 'events', true),
                'sisben' => $faker->imageUrl(400, 400, 'events', true),
            ]);
        }
    }
}
