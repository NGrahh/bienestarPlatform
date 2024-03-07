<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'lastname' => 'user',
            'user_name' => 'admin',
            'type_document_id' => 2,
            'document' => 1010,
            'email' => 'admin@gmail.com',
            'type_rh_id' => 1,
            'password' => Hash::make('123456'),
            'rol_id' => 1,
        ]);
    }
}
