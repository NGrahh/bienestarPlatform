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
        $days_training = [
            ['name' => 'Diurna'],
            ['name' => 'Nocturna'],
            ['name' => 'Mixta'],
        ];
        
        foreach ($days_training as $day_training) {
            typeDayTraining::create($day_training);
        }
    }
}
