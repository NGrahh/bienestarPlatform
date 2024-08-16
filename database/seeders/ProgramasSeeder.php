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
            ['name' => 'Construcciones Livianas Industrializadas en Seco'],
            ['name' => 'Elaboración de Audiovisuales'],
            ['name' => 'Analisis y Desarrollo de Software'],
            ['name' => 'Sistemas'],
            ['name' => 'Automatización de Sistemas Mecatronios'],
            ['name' => 'Productos de Multimedia'],
            ['name' => 'Integracion de Contenidos Digitales'],
            ['name' => 'Implementación y Mantenimiento de Equipos Electronicos'],
            ['name' => 'Implementacion de Infrastructura de Tecnologia de la Información'],
            ['name' => 'Electricidad Industrial'],
            ['name' => 'Programación d Software'],
            ['name' => 'Mecanizado en Torno y Fresadora Convencional'],
            ['name' => 'Desarrollo de Colecciones para la Industria de la Moda'],
            ['name' => 'Desarrollo de Sistemas Electronicos Industriales'],
            ['name' => 'Gestion del Mantenimiento de Automotores'],
            ['name' => 'Mantenimiento de Automatismos Industriales'],
            ['name' => 'Implementación y Mantenimiento de Equipos Electronicos Industriales'],
            ['name' => 'Construcción de Edicicaciones'],
            ['name' => 'Producción de Medios Audiovisuales Digitales'],
            ['name' => 'Gestión de Redes de Datos'],
            ['name' => 'Animación DIgital'],
            ['name' => 'Mantenimiento de Maquinas de Confección Industrial'],
            ['name' => 'Integración de Contenidos Digitales'],
            ['name' => 'Elaboración de Audiovisuales'],
            ['name' => 'Producción de Componentes Mecanicos Con Maquinade Control Numerico Computarizado'],
            ['name' => 'Mantenimiento de Vehiculos Livianos'],
            ['name' => 'Mantenimiento Mecatronico de Automotores'],
            ['name' => 'Dibujo y Modelado Arquitectonico y de Ingieneria'],
            ['name' => 'Mantenimiento de Equipos de Refrigeración, Ventilación y Climatización'],
            ['name' => 'Ebanisteria'],
            ['name' => 'Mantenimiento y Ensamble de Equipos Electronicos'],
            ['name' => 'Instalación de Sistemas Electronicos Residenciales y Comerciales'],
            ['name' => 'Mantenimiento Electrodomecanico Industrial'],
            ['name' => 'Construcciones Livianas Industrializadas en Seco'],
            ['name' => 'Mantenimiento Electromecánico Industrial'],
            ['name' => 'Mantenimiento de Sistemas de Propulsión Electrica e Hirbida Automotriz'],
            ['name' => 'Dibujo Digital de Arquitectura e Ingieneria'],
            ['name' => 'Soldadura de Productos Metalicos en Platina'],
            ['name' => 'Manejo de Maquinaria de Confección Industrial para Ropa Exterior'],
            ['name' => 'Levantamiento Topografico y Georreferenciación'],
            ['name' => 'Construcción de Edificaciones'],
            ['name' => 'Sistemas Teleinformaticos'],
            ['name' => 'Mantenimiento de Automatismos Industriales'],
            ['name' => 'Patronaje Industrial de Prendas de Vestir'],
            ['name' => 'Desarrollo de Componentes Mecanicos'],
            ['name' => 'Manejo de Maquinaria de Confección Industrial'],
            ['name' => 'Pintura Arquitectonica y Acabados Espaciales'],
            ['name' => 'Transformación de Polimeros por Inyección'],
            ['name' => 'Mecanica de Maquinaria Industrial'],
            ['name' => 'Dibujo Arquitectonico'],
            ['name' => 'Producción Audio Digital'],
            ['name' => 'Construcción de Infrastructura Vial'],
            ['name' => 'Catastro Multiproposito'],
            ['name' => 'Instalación de Redes de Computadores'],
            ['name' => 'Latoneria Automotriz'],
            ['name' => 'Supervisión de Procesos de Confección'],
            ['name' => 'Manejo de Maquinas para el Trabajo de la Madera'],
            ['name' => 'Carpinteria de Aluminio'],
            ['name' => 'Construcción de Edificaciones'],
            ['name' => 'Mantenimiento y Reparación de Edificaciones'],
            ['name' => 'Construcción de Arquitecturas en Concreto'],
            ['name' => 'Manejo de Maquinas de Confección Industrial para Ropa Interior y Deportiva'],

        ];

        foreach ($programas as $programa) { // Se crea el objeto programa, para que pueda recorrer los datos que se quieren enviar a la tabla y base datos
            Programas::create($programa); // Se crea lo mencionado, se crea el objeto de programa para que se pueda seleccionar el tipo de programa
        }
    }
}
