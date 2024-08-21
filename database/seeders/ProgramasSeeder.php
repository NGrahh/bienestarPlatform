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
        $programas = [
            ['name' => 'Analisis y Desarrollo de Software'],
            ['name' => 'Animación Digital'],
            ['name' => 'Automatización de Sistemas Mecatronios'],
            ['name' => 'Carpinteria de Aluminio'],
            ['name' => 'Catastro Multiproposito'],
            ['name' => 'Construcción de Arquitecturas en Concreto'],
            ['name' => 'Construcción de Edificaciones'],
            ['name' => 'Construcción de Infrastructura Vial'],
            ['name' => 'Construcciones Livianas Industrializadas en Seco'],
            ['name' => 'Desarrollo de Colecciones para la Industria de la Moda'],
            ['name' => 'Desarrollo de Componentes Mecanicos'],
            ['name' => 'Desarrollo de Sistemas Electronicos Industriales'],
            ['name' => 'Dibujo Arquitectonico'],
            ['name' => 'Dibujo Digital de Arquitectura e Ingenieria'],
            ['name' => 'Dibujo y Modelado Arquitectonico y de Ingieneria'],
            ['name' => 'Ebanisteria'],
            ['name' => 'Electricidad Industrial'],
            ['name' => 'Elaboración de Audiovisuales'],
            ['name' => 'Gestión de Redes de Datos'],
            ['name' => 'Gestion del Mantenimiento de Automotores'],
            ['name' => 'Implementación y Mantenimiento de Equipos Electronicos'],
            ['name' => 'Implementación y Mantenimiento de Equipos Electronicos Industriales'],
            ['name' => 'Implementacion de Infrastructura de Tecnologia de la Información'],
            ['name' => 'Instalación de Redes de Computadores'],
            ['name' => 'Instalación de Sistemas Electronicos Residenciales y Comerciales'],
            ['name' => 'Integracion de Contenidos Digitales'],
            ['name' => 'Integración de Contenidos Digitales'],
            ['name' => 'Latoneria Automotriz'],
            ['name' => 'Levantamiento Topografico y Georreferenciación'],
            ['name' => 'Mantenimiento de Automatismos Industriales'],
            ['name' => 'Mantenimiento de Equipos de Refrigeración, Ventilación y Climatización'],
            ['name' => 'Mantenimiento de Maquinas de Confección Industrial'],
            ['name' => 'Mantenimiento de Sistemas de Propulsión Electrica e Hirbida Automotriz'],
            ['name' => 'Mantenimiento de Vehiculos Livianos'],
            ['name' => 'Mantenimiento Electrodomecanico Industrial'],
            ['name' => 'Mantenimiento Electromecánico Industrial'],
            ['name' => 'Mantenimiento Mecatronico de Automotores'],
            ['name' => 'Mantenimiento y Ensamble de Equipos Electronicos'],
            ['name' => 'Mantenimiento y Reparación de Edificaciones'],
            ['name' => 'Manejo de Maquinaria de Confección Industrial para Ropa Exterior'],
            ['name' => 'Manejo de Maquinas de Confección Industrial para Ropa Interior y Deportiva'],
            ['name' => 'Manejo de Maquinas para el Trabajo de la Madera'],
            ['name' => 'Mecanica de Maquinaria Industrial'],
            ['name' => 'Mecanizado en Torno y Fresadora Convencional'],
            ['name' => 'Patronaje Industrial de Prendas de Vestir'],
            ['name' => 'Pintura Arquitectonica y Acabados Espaciales'],
            ['name' => 'Producción Audio Digital'],
            ['name' => 'Producción de Componentes Mecanicos Con Maquinade Control Numerico Computarizado'],
            ['name' => 'Producción de Medios Audiovisuales Digitales'],
            ['name' => 'Programación d Software'],
            ['name' => 'Sistemas'],
            ['name' => 'Sistemas Teleinformaticos'],
            ['name' => 'Soldadura de Productos Metalicos en Platina'],
            ['name' => 'Supervisión de Procesos de Confección'],
            ['name' => 'Transformación de Polimeros por Inyección'],
        ];

        foreach ($programas as $programa) {
            Programas::create($programa);
        }
    }
}
