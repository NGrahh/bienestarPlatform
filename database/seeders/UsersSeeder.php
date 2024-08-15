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

        // Crear el usuario 'Administrador'

        User::create([ //Este comando de php, creará el usuario de acuerdo a los atributos asignados aquí
            'name' => 'Camila', //Nombre del usuario al activar las migraciones
            'lastname' => 'Martinez', //Apellido del usuario
            'user_name' => 'admin', //nombre de usuario que le asignará al usuario
            'type_document_id' => 2, // tipo de documento asignado al usuario 
            'document' => 101010101, // número de documento del usuario
            'email' => 'admin@gmail.com', // email del usurio
            'numberphone'=> 2020202020,
            'type_rh_id' => 1, // tipo de rh del usario (O+, AB-, etc)
            'password' => Hash::make('123456'),  // Se crea la contraseña '123456' de manera encriptada
            // 'password' => Hash::make('Kemba2005*') Aquí se muestra la contraseña en el host
            'rol_id' => 1, // El tipo de rol que cumplirá este usuario
            

        ]);

        
        

        User::create([
            'name' => 'Camilo',
            'lastname' => 'Lopez',
            'user_name' => 'camil',
            'type_document_id' => 2,
            'document' => 1212121221,
            'email' => 'd ',
            'type_rh_id' => 1,
            'numberphone'=>30303030,
            'password' => Hash::make('123456'),
            'rol_id' => 2,
            

        ]);

        // Crear el usuario 'Aprendiz'

        User::create([
            'name' => 'Ivan Mauricio',
            'lastname' => 'Duque Aricapa',
            'user_name' => 'ivdu',
            'type_document_id' => 1,
            'document' => 1089577728,
            'email' => 'duqueivan493@gmail.com',
            'type_rh_id' => 1,
            'numberphone'=> 4040404040,
            'password' => Hash::make('123456789'),
            'rol_id' => 5,
            

        ]);

        // Crear el usuario 'Miembro Bienestar'

        User::create([
            'name' => 'Andres',
            'lastname' => 'Lopez',
            'user_name' => 'adlopezx',
            'type_document_id' => 1,
            'document' => 1089566628,
            'email' => 'miembrobienestar@gmail.com',
            'type_rh_id' => 1,
            'numberphone'=> 5050505050,
            'password' => Hash::make('123456789'),
            'rol_id' => 3,
        ]);

        // Crear el usuario 'Miembro Bienestar Apoyo'

        User::create([
            'name' => 'Andres',
            'lastname' => 'Lopez',
            'user_name' => 'adlopez',
            'type_document_id' => 1,
            'document' => 1089555528,
            'email' => 'miembrobienestarap@gmail.com',
            'type_rh_id' => 1,
            'numberphone'=>606060606,
            'password' => Hash::make('123456789'),
            'rol_id' => 4,
            

        ]);
        // Crear 10 usuarios adicionales con datos aleatorios
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->firstName,
                'lastname' => $faker->lastName,
                'user_name' => $faker->userName,
                'type_document_id' => $faker->numberBetween(1, 4),
                'document' => $faker->unique()->randomNumber(8),
                'email' => $faker->unique()->safeEmail,
                'type_rh_id' => $faker->numberBetween(1, 5),
                'numberphone' => $faker->unique()->randomNumber(8),
                'password' => Hash::make('password'),
                'rol_id' => 5,
            ]);
        }
        User::create([
            'name' => 'Nicolás',
            'lastname' => 'Grajales',
            'user_name' => 'Ngrajales',
            'type_document_id' => 1,
            'document' => 10895558523,
            'email' => 'nicolasgrajales@gmail.com',
            'type_rh_id' => 1,
            'numberphone' => $faker->unique()->randomNumber(8),
            'password' => Hash::make('123456789'),
            'rol_id' => 4,
            

        ]);
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
        //         'yourToken' => $faker->unique()->numerify('#########'), 
        //         'rol_id' => $faker->numberBetween(4,5),
                
        //     ]);
        // }
    }
}