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
        $roles = [
            ['name' => 'A+'],
            ['name' => 'O+'],
            ['name' => 'B+'],
            ['name' => 'AB+'],
            ['name' => 'A-'],
            ['name' => 'O-'],
            ['name' => 'B-'],
            ['name' => 'AB-']
        ];
        
        foreach ($roles as $role) {
            typeRh::create($role);
        }
    }
}
