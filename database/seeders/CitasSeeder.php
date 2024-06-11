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
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            Citas::create([
                'name' => $faker->firstName,
                        'lastname' => $faker->lastName,
                        'dimensions_id' => rand(1, 5), // Assumes you have 10 dimensions
                        'email' => $faker->unique()->safeEmail,
                        'mobilenumber' => $faker->numerify('###########'), // Generates a random phone number
                        'date' => $faker->date('Y-m-d', 'now'), // Generates a date between now and past
                        'hour' => $faker->time('H:i', rand(strtotime('08:00'), strtotime('18:00'))), // Generates a time between 08:00 and 18:00
                        'subjectCita' => $faker->sentence,
                        'created_at' => now(),
                        'updated_at' => now(),
            ]);
        }
    }
}