<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\hours;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder 
{

    public function run(): void
    {


        $this->call([RolesTableSeeder::class]); 
        $this->call([TypeDimensionsSeeder::class]);
        $this->call([TypeDocumentsTableSeeder::class]);
        $this->call([typeRhSeeder::class]);
        $this->call([UsersSeeder::class]);
        $this->call([day_trainingSeeder::class]);
        $this->call([ProgramasSeeder::class]);
        // $this->call([CitasSeeder::class]);
        $this->call([citas_acciones::class]);  
        // $this->call([ApoyosTableSeeder::class]); 
        $this->call([HorasSeeder::class]); 
    }
}