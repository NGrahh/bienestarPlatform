<?php

namespace Database\Seeders;

use App\Models\Citas;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); // Usamos la dependecia de composer, faker, para ingresar datos falsos o alatorios en alguna tabla y base de datos.

        for ($i = 0; $i < 20; $i++) {
            Citas::create([
                'user_id' => \App\Models\User::inRandomOrder()->first()->id, // Asigna un ID de usuario aleatorio existente
                'dimensions_id' => rand(1, 5), // Genera un ID de dimensión aleatorio entre 1 y 5
                'date' => $faker->date('Y-m-d', 'now'), // Genera una fecha entre hoy y el pasado
                'hour' => $faker->time('H:i:s', rand(strtotime('08:00:00'), strtotime('18:00:00'))), // Genera una hora entre 08:00 y 18:00
                'subjectCita' => $faker->sentence, // Genera un asunto aleatorio
                'created_at' => now(), // Establece la fecha de creación en la fecha y hora actual
                'updated_at' => now(), // Establece la fecha de actualización en la fecha y hora actual
            ]);
        }
    }
}