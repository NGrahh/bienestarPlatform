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
        $type_rhs = [
            ['name' => 'A+'],
            ['name' => 'O+'],
            ['name' => 'B+'],
            ['name' => 'AB+'],
            ['name' => 'A-'],
            ['name' => 'O-'],
            ['name' => 'B-'],
            ['name' => 'AB-']
        ];
        
        foreach ($type_rhs as $type_rh) {
            typeRh::create($type_rh);
        }
    }
}
