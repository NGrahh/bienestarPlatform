<?php

namespace Database\Seeders;

use App\Models\TypeDimensions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeDimensionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dimensions_types = [
            ['name' => 'Consejería y atención psicosocial'],
            ['name' => 'Arte y cultura'],
            ['name' => 'Deportes'],
            ['name' => 'Promoción y prevención de salud'],
            ['name' => 'Apoyos de sostenimiento'],
            ['name' => 'Liderazgo']
        ];
        
        foreach ($dimensions_types as $Dimensions_type) {
            TypeDimensions::create($Dimensions_type);
        }
    }
}

