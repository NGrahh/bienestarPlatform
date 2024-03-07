<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Lider bienestar'],
            ['name' => 'Miembro bienestar'],
            ['name' => 'Miembro bienestar apoyo'],
            ['name' => 'Aprendiz'],
        ];
        
        foreach ($roles as $role) {
            Roles::create($role);
        }
        
    }
}
