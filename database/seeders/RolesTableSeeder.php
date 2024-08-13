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
        $roles = [ // Nombre del objeto en dónde se almacenarán y mostrarán los tipos de roles que cumpliran los usuarios.
            //Nombres de los roles que se les podrá asignar a los usuarios.
            ['name' => 'Admin'],
            ['name' => 'Lider bienestar'],
            ['name' => 'Miembro bienestar'],
            ['name' => 'Miembro bienestar apoyo'],
            ['name' => 'Aprendiz'],
        ];
        
        foreach ($roles as $role) { //Nombre de la variable / campo en el cual se podrá designar el rol para el usuario.
            Roles::create($role); // Aquí ya se muestra la creación del campo para que se puedan mostrar los roles. 
        }
        
    }
}
