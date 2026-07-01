<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jadwal;

class JadwalSeeder extends Seeder
{
    public function run()
    {
        Jadwal::create([
            'user_id' => 2,
            'area_piket_id' => 1,
            'tanggal' => now(),
            'status' => 'Belum Dikerjakan'
        ]);

        Jadwal::create([
            'user_id' => 3,
            'area_piket_id' => 2,
            'tanggal' => now(),
            'status' => 'Belum Dikerjakan'
        ]);

        Jadwal::create([
            'user_id' => 4,
            'area_piket_id' => 3,
            'tanggal' => now(),
            'status' => 'Belum Dikerjakan'
        ]);
    }
}