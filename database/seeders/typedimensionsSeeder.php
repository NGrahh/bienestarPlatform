<?php

namespace Database\Seeders;

use App\Models\typedimensions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class typedimensionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dimensions = [
            ['name' => 'Consejería y atención psicosocial'],
            ['name' => 'Arte y cultura'],
            ['name' => 'Deportes'],
            ['name' => 'Promoción y prevención de salud'],
            ['name' => 'Apoyos de sostenimiento'],
            ['name' => 'Liderazgo']
        ];

        foreach($dimensions as $dimension){
            typedimensions::create($dimension);
        }
    }
}
