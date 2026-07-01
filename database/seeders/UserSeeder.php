<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Koordinator Asrama',
            'kamar' => '-',
            'email' => 'admin@dutio.com',
            'password' => Hash::make('password'),
            'role' => 'koordinator',
        ]);

        User::create([
            'name' => 'Perwakilan Kamar A',
            'kamar' => 'Kamar A',
            'email' => 'kamara@dutio.com',
            'password' => Hash::make('password'),
            'role' => 'penghuni',
        ]);

        User::create([
            'name' => 'Perwakilan Kamar B',
            'kamar' => 'Kamar B',
            'email' => 'kamarb@dutio.com',
            'password' => Hash::make('password'),
            'role' => 'penghuni',
        ]);

        User::create([
            'name' => 'Perwakilan Kamar C',
            'kamar' => 'Kamar C',
            'email' => 'kamarc@dutio.com',
            'password' => Hash::make('password'),
            'role' => 'penghuni',
        ]);
    }
}