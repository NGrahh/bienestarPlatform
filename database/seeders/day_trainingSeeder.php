<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\typeDayTraining;

class day_trainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days_training = [ //nombre del objeto en donde se alcamenarán los tipos de jornada para cada aprendiz.
            ['name' => 'Diurna'], // Jornada de Diurna
            ['name' => 'Nocturna'], // Jornada Nocturna
            ['name' => 'Mixta'], // Jornada Mixta
        ];
        
        foreach ($days_training as $day_training) { // Se crea el objeto days_training, para que pueda recorrer los datos que se quieren enviar a la tabla y  base datos
            typeDayTraining::create($day_training); // Y aquí se crea lo que se mencionó anteriromente, se crea la days_training para que se pueda seleccionar el tipo de jornada para el aprendiz o incluso algún miembro de bienestar
        }
    }
}
