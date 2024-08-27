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

    User::create([
        'name' => 'Camila',
        'lastname' => 'Martinez',
        'user_name' => 'admin',
        'type_document_id' => 2,
        'document' => 101010101,
        'email' => 'admin@gmail.com',
        'numberphone' => 2020202020,
        'type_rh_id' => 1,
        'password' => Hash::make('123456'),
        'rol_id' => 1,
        'type_dimensions_id' => null,
    ]);

    User::create([
        'name' => 'LÍDER',
        'lastname' => 'BIENESTAR',
        'user_name' => 'LIDERB',
        'type_document_id' => 2,
        'document' => 1212121221,
        'email' => 'liderb@net.com',
        'type_rh_id' => 1,
        'numberphone' => 30303030,
        'password' => Hash::make('123456'),
        'rol_id' => 3,
        'type_dimensions_id' => 3,
    ]);

    User::create([
        'name' => 'Ivan Mauricio',
        'lastname' => 'Duque Aricapa',
        'user_name' => 'ivdu',
        'type_document_id' => 1,
        'document' => 1089577728,
        'email' => 'duqueivan493@gmail.com',
        'type_rh_id' => 1,
        'numberphone' => 4040404040,
        'password' => Hash::make('123456789'),
        'rol_id' => 5,
        
    ]);

    // // User::create([
    // //     'name' => 'Andres',
    // //     'lastname' => 'Lopez',
    // //     'user_name' => 'adlopezx',
    // //     'type_document_id' => 1,
    // //     'document' => 1089566628,
    // //     'email' => 'miembrobienestar@gmail.com',
    // //     'type_rh_id' => 1,
    // //     'numberphone' => 5050505050,
    // //     'password' => Hash::make('123456789'),
    // //     'rol_id' => 3,
    // //     'type_dimensions_id' => 2,
    // // ]);

    // User::create([
    //     'name' => 'Andres',
    //     'lastname' => 'Lopez',
    //     'user_name' => 'adlopez',
    //     'type_document_id' => 1,
    //     'document' => 1089555528,
    //     'email' => 'miembrobienestarap@gmail.com',
    //     'type_rh_id' => 1,
    //     'numberphone' => 606060606,
    //     'password' => Hash::make('123456789'),
    //     'rol_id' => 4,
        
    // ]);

    // for ($i = 0; $i < 10; $i++) {
    //     User::create([
    //         'name' => $faker->firstName,
    //         'lastname' => $faker->lastName,
    //         'user_name' => $faker->userName,
    //         'type_document_id' => $faker->numberBetween(1, 4),
    //         'document' => $faker->unique()->randomNumber(8),
    //         'email' => $faker->unique()->safeEmail,
    //         'type_rh_id' => $faker->numberBetween(1, 5),
    //         'numberphone' => $faker->unique()->randomNumber(8),
    //         'password' => Hash::make('password'),
    //         'rol_id' => 5,
            
    //     ]);
    // }

    // User::create([
    //     'name' => 'Nicolás',
    //     'lastname' => 'Grajales',
    //     'user_name' => 'Ngrajales',
    //     'type_document_id' => 1,
    //     'document' => 1089555852,
    //     'email' => 'nicolasgrajales@gmail.com',
    //     'type_rh_id' => 1,
    //     'numberphone' => $faker->unique()->randomNumber(8),
    //     'password' => Hash::make('123456789'),
    //     'rol_id' => 4,
        
    // ]);

    // for ($x = 0; $x < 10; $x++) {
    //     User::create([
    //         'name' => $faker->firstName,
    //         'lastname' => $faker->lastName,
    //         'user_name' => $faker->userName,
    //         'type_document_id' => $faker->numberBetween(1, 5),
    //         'document' => $faker->unique()->randomNumber(8),
    //         'email' => $faker->unique()->safeEmail,
    //         'type_rh_id' => $faker->numberBetween(1, 5),
    //         'password' => Hash::make('password'),
    //         'Program_id' => $faker->numberBetween(1, 10),
    //         'numberphone' => $faker->unique()->randomNumber(8),
    //         'yourToken' => $faker->unique()->numerify('#########'),
    //         'rol_id' => $faker->numberBetween(4, 5),
    //     ]);
    // }
    }
}