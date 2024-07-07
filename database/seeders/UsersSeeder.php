<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Crear el usuario administrador
        User::create([
            'name' => 'admin',
            'lastname' => 'user',
            'user_name' => 'admin',
            'type_document_id' => 2,
            'document' => 101010101,
            'email' => 'admin@gmail.com',
            'type_rh_id' => 1,
            'password' => Hash::make('123456'),
            'rol_id' => 1,
            

        ]);

        // Crear 10 usuarios adicionales con datos aleatorios
        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => $faker->firstName,
                'lastname' => $faker->lastName,
                'user_name' => $faker->userName,
                'type_document_id' => $faker->numberBetween(1, 5),
                'document' => $faker->unique()->randomNumber(8),
                'email' => $faker->unique()->safeEmail,
                'type_rh_id' => $faker->numberBetween(1, 5),
                'password' => Hash::make('password'),
                'rol_id' => $faker->numberBetween(1, 3),
                

            ]);
        }
        for ($x = 0; $x < 10; $x++) {
            User::create([
                'name' => $faker->firstName,
                'lastname' => $faker->lastName,
                'user_name' => $faker->userName,
                'type_document_id' => $faker->numberBetween(1, 5),
                'document' => $faker->unique()->randomNumber(8),
                'email' => $faker->unique()->safeEmail,
                'type_rh_id' => $faker->numberBetween(1, 5),
                'password' => Hash::make('password'), 
                'Program_id' => $faker->numberBetween(1, 10), 
                'yourToken' => $faker->unique()->numerify('#########'), 
                'rol_id' => $faker->numberBetween(4,5),
                
            ]);
        }
    }
}
