<?php

namespace Database\Seeders;

use App\Models\TypeDocuments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeDocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Tarjeta de Identidad'],
            ['name' => 'Cédula de Ciudadanía'],
            ['name' => 'Cédula de Extranjería'],
            ['name' => 'PEP'],
            ['name' => 'Permiso por Protección Temporal'],
        ];
        
        foreach ($types as $type) {
            TypeDocuments::create($type);
        }
    }
}
