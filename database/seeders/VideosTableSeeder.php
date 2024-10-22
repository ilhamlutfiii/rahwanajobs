<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video; // Pastikan model Video ada

class VideosTableSeeder extends Seeder
{
    public function run()
    {
        Video::create([
            'name' => 'Video 1',
            'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',  // Ganti dengan link yang sesuai
        ]);

        Video::create([
            'name' => 'Video 2',
            'link' => 'https://www.youtube.com/watch?v=3JZ_D3ELwOQ',  // Ganti dengan link yang sesuai
        ]);

        Video::create([
            'name' => 'Video 3',
            'link' => 'https://www.youtube.com/watch?v=4fndeDfaWCg',  // Ganti dengan link yang sesuai
        ]);
    }
}
