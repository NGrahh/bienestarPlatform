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
        $actions_cita = [
            ['name' => 'Aceptar'],
            ['name' => 'Posponer'],
            ['name' => 'Rechazar'],
        ];
        
        foreach ($actions_cita as $action_cita) {
            accionesCitas::create($action_cita);
        }
    }
}
