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
        $apoyos = [ // Nombre de lo tabla en donde se almacenarán los datos respectivos
            ['name' => 'Apoyo Fic'], // Aquí se integra el nombre del apoyo FIC dentro de la tabla
            ['name' => 'Apoyo Alimentación'],
            ['name' => 'Apoyo Datos'],
            ['name' => 'Apoyo Sostenimiento'],
            ['name' => 'Apoyo Transporte'],
        ];

        // Insertar los datos en la tabla 'apoyos'
        DB::table('tipos_apoyos')->insert($apoyos); // Aquí es el nombre de la tabla en donde se ingresarán los datos que se muestran arriba.
    }
}
