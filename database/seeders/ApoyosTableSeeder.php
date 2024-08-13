<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApoyosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Datos para la tabla 'apoyos'
        $apoyos = [
            ['name' => 'Apoyo Fic'],
            ['name' => 'Apoyo Alimentación'],
            ['name' => 'Apoyo Datos'],
            ['name' => 'Apoyo Sostenimiento'],
            ['name' => 'Apoyo Transporte'],
        ];

        // Insertar los datos en la tabla 'apoyos'
        DB::table('tipos_apoyos')->insert($apoyos);
    }
}
