<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Horas;

class HorasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Se crea el objeto para crear las horas que se les asignáran

        $horas  = [
            ['name' => '7: 00 AM'],
            ['name' => '7: 30 AM'],
            ['name' => '8: 00 AM'],
            ['name' => '8: 30 AM'],
            ['name' => '9: 00 AM'],
            ['name' => '9: 30 AM'],
            ['name' => '1: 00 AM'],
            ['name' => '10: 30 AM'],
            ['name' => '11: 00 AM'],
            ['name' => '11: 30 AM'],
            ['name' => '12: 00 AM'],
            ['name' => '12: 30 AM'],
            ['name' => '1: 00 PM'],
            ['name' => '1: 30 PM'],
            ['name' => '2: 00 PM'],
            ['name' => '2: 30 PM'],
            ['name' => '3: 00 PM'],
            ['name' => '3: 30 PM'],
            ['name' => '4: 00 PM'],
            ['name' => '4: 30 PM'],
            ['name' => '5: 00 PM'],
            ['name' => '5: 30 PM'],
            ['name' => '6: 00 PM'],
            ['name' => '6: 30 PM'],
            ['name' => '7: 00 PM'],
            ['name' => '7: 30 PM'],
        ];
        foreach ($horas as $horas){ // Se crea un ciclo para recorrer todo el objeto
            Horas::create($horas); // Se crea el atributo de Horas usando el objeto superior
        }
    }
}
