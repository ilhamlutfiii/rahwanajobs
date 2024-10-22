<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resume; // Pastikan model Resume ada

class ResumesTableSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan beberapa data resume
        Resume::create([
            'name' => 'John Doe',
            'nomer' => '123456789',
            'file_path' => 'resumes/johndoe_resume.png',
        ]);

        Resume::create([
            'name' => 'Jane Smith',
            'nomer' => '987654321',
            'file_path' => 'resumes/janesmith_resume.jpg',
        ]);

        Resume::create([
            'name' => 'Michael Johnson',
            'nomer' => '555555555',
            'file_path' => 'resumes/michaeljohnson_resume.png', 
        ]);
    }
}
