<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AreaPiket;

class AreaPiketSeeder extends Seeder
{
    public function run()
    {
        $areas = [
            'Kamar Mandi',
            'Taman',
            'Koridor',
            'Mushola',
            'Dapur',
        ];

        foreach ($areas as $area) {
            AreaPiket::create([
                'nama_area' => $area,
                'deskripsi' => 'Area piket ' . $area,
            ]);
        }
    }
}