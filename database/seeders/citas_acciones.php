<?php

namespace Database\Seeders;

use App\Models\accionesCitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class citas_acciones extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actions_cita = [ // Nombre del objeto, en donde se almacenarán los datos hacía la tabla actions_cita
            ['name' => 'Aceptar'], // Nombre de aceptar para las acciones que podrá recibir la cita en la base de datos.
            ['name' => 'Posponer'], // Nombre de posponer para poder enviar que se pospone x cita en la base de datos, así llegará al usuario dicha posposición.
            ['name' => 'Rechazar'], // Nombre de rechazar, que se mostrará la acción en la base de datos.
        ];
        
        foreach ($actions_cita as $action_cita) { // Se crea la actions_cita como actions_cita
            accionesCitas::create($action_cita); //Se crea el objeto de actions_citas
        }
    }
}
