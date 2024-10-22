<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Loker; // Pastikan model Loker ada

class LokersTableSeeder extends Seeder
{
    public function run()
    {
        Loker::create([
            'bid' => 'Bid 1',
            'nampe' => 'Nama Perusahaan 1',
            'kual' => json_encode(['Kualifikasi 1', 'Kualifikasi 2']), // Gunakan json_encode untuk mengonversi array ke string
            'job' => json_encode(['Job 1', 'Job 2']), // Gunakan json_encode untuk mengonversi array ke string
            'dl' => '2024-12-31',
        ]);

        Loker::create([
            'bid' => 'Bid 2',
            'nampe' => 'Nama Perusahaan 2',
            'kual' => json_encode(['Kualifikasi 3', 'Kualifikasi 4']), // Gunakan json_encode untuk mengonversi array ke string
            'job' => json_encode(['Job 3', 'Job 4']), // Gunakan json_encode untuk mengonversi array ke string
            'dl' => '2024-12-31',
        ]);

        Loker::create([
            'bid' => 'Bid 3',
            'nampe' => 'Nama Perusahaan 3',
            'kual' => json_encode(['Kualifikasi 5']), // Gunakan json_encode untuk mengonversi array ke string
            'job' => json_encode(['Job 5', 'Job 6']), // Gunakan json_encode untuk mengonversi array ke string
            'dl' => '2024-12-31',
        ]);
    }
}
