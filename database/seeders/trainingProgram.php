<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Programas;
class trainingProgram extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programas = [
            ['name' => 'Analisís y Desarrollo de Sofware'],
            ['name' => 'Construcción en Edificaciones'],
            ['name' => 'Contol de Calidad en Confeccion Industrial'],
            ['name' => 'Desarrollo colecciones para Industria de moda'],
            ['name' => 'Desarrollo colecciones para Industria de moda'],
            ['name' => 'Desarrollo de medios graficos visuales'],
            ['name' => 'Dibujo Arquitectonico'],
            ['name' => 'Electricidad Industrial'],
            ['name' => 'Implementacion de Infrastructura de Tecnologia de la Informacion y las Comunicaciónes'],
            ['name' => 'Integracion de Contenidos Digitales'],
            ['name' => 'Manejo de maquinaria de confeccion industrial para ropa exterior'],
            ['name' => 'Mantenimiento Electromecanico Industrial'],
            ['name' => 'Mantenimiento de equipos de refrigeracion, ventilacion y climatización'],
            ['name' => 'Mantenimiento de Vehiculos Livianos'],
            ['name' => 'Mantenimiento de motocicletas y motocarros'],
            ['name' => 'Mantenimiento Mecatronico de Automotores'],
            ['name' => 'Marketing digital para el sistema de moda'],
            ['name' => 'Supervicion en procesos de confección']
        ];
        foreach ($programas as $programa) {
            Programas::create($programa);
        }
    }
}
