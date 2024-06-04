<?php

namespace Database\Seeders;

use App\Models\Events;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Crear 20 eventos adicionales con datos aleatorios
        for ($i = 0; $i < 20; $i++) {
            Events::create([
                'eventname'    => $faker->sentence(3), // Nombre del evento
                'picture'      => $faker->imageUrl(640, 480, 'events', true), // URL de una imagen de evento
                'eventdate'    => $faker->dateTimeBetween('-1 years', '+1 years'), // Fecha del evento
                'eventlimit'   => $faker->numberBetween(50, 200), // Límite de participantes
                'datestar'     => $faker->dateTimeBetween('-1 years', 'now'), // Fecha de inicio del evento
                'dateendevent' => $faker->dateTimeBetween('now', '+1 years'), // Fecha de fin del evento
                'Subjectevent' => $faker->words(3, true), // Asunto del evento
            ]);
        }
    }
}
