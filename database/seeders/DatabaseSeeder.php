<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //php artisan db:seed --class=UsersSeeder

        $this->call([RolesTableSeeder::class]);
        $this->call([TypeDocumentsTableSeeder::class]);
        $this->call([typeRhSeeder::class]);
        $this->call([UsersSeeder::class]);
        $this->call([day_trainingSeeder::class]);
        $this->call([TypeDimensionsSeeder::class]);
        $this->call([ProgramasSeeder::class]);

    }
}
