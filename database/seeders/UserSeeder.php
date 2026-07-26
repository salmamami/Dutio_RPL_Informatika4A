<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@dutio.com'],
            [
                'name' => 'Koordinator Asrama',
                'kamar' => '-',
                'password' => Hash::make('admin123'),
                'role' => 'koordinator',
                'status' => 'aktif',
            ]
        );

        User::updateOrCreate(
            ['email' => 'kamara@dutio.com'],
            [
                'name' => 'Perwakilan Kamar A',
                'kamar' => 'Kamar A',
                'password' => Hash::make('kamara123'),
                'role' => 'penghuni',
                'status' => 'aktif',
            ]
        );

        User::updateOrCreate(
            ['email' => 'kamarb@dutio.com'],
            [
                'name' => 'Perwakilan Kamar B',
                'kamar' => 'Kamar B',
                'password' => Hash::make('kamarb123'),
                'role' => 'penghuni',
                'status' => 'aktif',
            ]
        );

        User::updateOrCreate(
            ['email' => 'kamarc@dutio.com'],
            [
                'name' => 'Perwakilan Kamar C',
                'kamar' => 'Kamar C',
                'password' => Hash::make('kamarc123'),
                'role' => 'penghuni',
                'status' => 'aktif',
            ]
        );
    }
}