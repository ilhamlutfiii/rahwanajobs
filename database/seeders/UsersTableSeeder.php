<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan model User ada

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Arlan',
            'email' => 'arlan@gmail.com',
            'password' => bcrypt('arlanoke'), // Hash password
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Ilham',
            'email' => 'ilham@gmail.com',
            'password' => bcrypt('ilhamoke'), // Hash password
            'role' => 'user',
        ]);
    }
}

