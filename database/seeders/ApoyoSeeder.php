<?php
use App\Models\InscriptApoyoRegistration;
use Illuminate\Database\Seeder;
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
        for ($i = 0; $i < 10; $i++) {
            apoyos::create([
                'name' => $faker->$firtsName,
                    'lastname' => $faker->$lastName,
                    'email' => $faker->unique()->safeEmail,
                    'mobilnumber' => $faker->numerify('###########'),
                    'formatuser' => $faker-> imageUrl(700,700,'ftRegistro', true),
                    'photocopy' => $faker -> imageUrl(700,700, 'ftDocument', true),
                    'sisben' => $faker->imageUrl(700,700,'ftSisben', true),
                    'support' => $faker->imageUrl(700,700,'ftSupport', true),
                    'created_at' => now(),
                    'updated_at' => now(),
            ]);
        }
    }
}

?>