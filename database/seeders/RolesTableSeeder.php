<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'Admin'],
            ['name' => 'Lider bienestar'],
            ['name' => 'Miembro bienestar'],
            ['name' => 'Miembro bienestar apoyo'],
            ['name' => 'Aprendiz'],
        ]);
    }
}
