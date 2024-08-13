<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\hours;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder //La seeder la cual obtendrá y enviará los datos de las otras semillas praa que funcionen.
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //php artisan db:seed --class=UsersSeeder
        // En función, esta base de datos lo que hace es usarse como seeder para así detectar las demás, así lo que hace en el momento
        // en el que se vaya a migrar, se migren en cojunto a las semillas (php artisan migrate:refresh --seed) por ello el uso de la 
        // palabra 'call' , así se llama a esa semilla y al momento de ejecutar las semillas se muestran sobre las mismas.
        $this->call([RolesTableSeeder::class]); //Se hace la llamada, para que así funcione la semilla en el momento de ejecutarla.
        $this->call([TypeDocumentsTableSeeder::class]);
        $this->call([typeRhSeeder::class]);
        $this->call([UsersSeeder::class]);
        $this->call([day_trainingSeeder::class]);
        $this->call([TypeDimensionsSeeder::class]);
        $this->call([ProgramasSeeder::class]);
        $this->call([EventsSeeder::class]);
        $this->call([CitasSeeder::class]);
        $this->call([citas_acciones::class]);  
        $this->call([ApoyosTableSeeder::class]);  
    }
}