<?php

namespace Database\Seeders;

use App\Models\typeRh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class typeRhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dimensions= [
            ['name' => 'Deportes'],
            ['name' => 'Música'],
            ['name' => 'Psicología'],
            ['name' => 'Enfermería'],
        ];
        
        foreach ($dimensions as $dimension) {
            typeRh::create($dimension);
        }
    }
}
