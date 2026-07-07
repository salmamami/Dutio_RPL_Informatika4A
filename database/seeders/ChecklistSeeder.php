<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Checklist;

class ChecklistSeeder extends Seeder
{
    public function run()
    {
        // Area 1 = Kamar Mandi
        Checklist::insert([
            ['area_piket_id'=>1,'aktivitas'=>'Menguras bak mandi'],
            ['area_piket_id'=>1,'aktivitas'=>'Menyikat kloset'],
            ['area_piket_id'=>1,'aktivitas'=>'Membersihkan wastafel'],
            ['area_piket_id'=>1,'aktivitas'=>'Membersihkan kaca'],
            ['area_piket_id'=>1,'aktivitas'=>'Mengepel lantai'],

            ['area_piket_id'=>2,'aktivitas'=>'Menyapu daun'],
            ['area_piket_id'=>2,'aktivitas'=>'Menyiram tanaman'],
            ['area_piket_id'=>2,'aktivitas'=>'Membuang sampah taman'],

            ['area_piket_id'=>3,'aktivitas'=>'Menyapu koridor'],
            ['area_piket_id'=>3,'aktivitas'=>'Mengepel koridor'],

            ['area_piket_id'=>4,'aktivitas'=>'Menyapu mushola'],
            ['area_piket_id'=>4,'aktivitas'=>'Merapikan sajadah'],

            ['area_piket_id'=>5,'aktivitas'=>'Membersihkan kompor'],
            ['area_piket_id'=>5,'aktivitas'=>'Mengepel dapur'],
        ]);
    }
}