<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = [

            [
                'id' => 1,
                'nama' => 'Salma',
                'email' => 'salma@gmail.com',
                'kamar' => 'Kamar A',
                'role' => 'Penghuni'
            ],

            [
                'id' => 2,
                'nama' => 'Aisyah',
                'email' => 'aisyah@gmail.com',
                'kamar' => 'Kamar B',
                'role' => 'Penghuni'
            ],

            [
                'id' => 3,
                'nama' => 'Nabila',
                'email' => 'admin@gmail.com',
                'kamar' => '-',
                'role' => 'Koordinator'
            ],

        ];

        return view(
            'koordinator.user.index',
            compact('users')
        );
    }

    public function create()
    {
        return view('koordinator.user.create');
    }

    public function edit($id)
    {
        $user = [

            'id' => $id,
            'nama' => 'Salma',
            'email' => 'salma@gmail.com',
            'kamar' => 'Kamar A',
            'role' => 'Penghuni'

        ];

        return view(
            'koordinator.user.edit',
            compact('user')
        );
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}