<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Programas;

class ProgramasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programas = [ //Nombre del objeto que contiene todos los tipos de programas seleccionables en el momento de crear algún aprendiz o incluso en algún formulario.
            //Nombres de cada uno de los programas que puede llegar a tener el centro, (los conocidos hasta el momento)
            ['name' => 'Análisis y Desarrollo de Software'],
            ['name' => 'Construcción en Edificaciones'],
            ['name' => 'Control de Calidad en Confección Industrial'],
            ['name' => 'Desarrollo colecciones para Industria de moda'],
            ['name' => 'Desarrollo colecciones para Industria de moda'],
            ['name' => 'Desarrollo de medios gráficos visuales'],
            ['name' => 'Dibujo Arquitectónico'],
            ['name' => 'Electricidad Industrial'],
            ['name' => 'Implementación de Infraestructura de Tecnología de la Información y las Comunicaciones'],
            ['name' => 'Integración de Contenidos Digitales'],
            ['name' => 'Manejo de maquinaria de confección industrial para ropa exterior'],
            ['name' => 'Mantenimiento Electromecánico Industrial'],
            ['name' => 'Mantenimiento de equipos de refrigeración, ventilación y climatización'],
            ['name' => 'Mantenimiento de Vehículos Livianos'],
            ['name' => 'Mantenimiento de motocicletas y motocarros'],
            ['name' => 'Mantenimiento Mecatrónico de Automotores'],
            ['name' => 'Marketing digital para el sistema de moda'],
            ['name' => 'Supervisión en procesos de confección']
        ];

        foreach ($programas as $programa) { // Se crea el objeto programa, para que pueda recorrer los datos que se quieren enviar a la tabla y base datos
            Programas::create($programa); // Se crea lo mencionado, se crea el objeto de programa para que se pueda seleccionar el tipo de programa
        }
    }
}
