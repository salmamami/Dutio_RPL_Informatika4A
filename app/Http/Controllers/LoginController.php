<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if ($email == 'user@gmail.com' && $password == '123456') {
            return redirect('/dashboard-user');
        }

        if ($email == 'koordinator@gmail.com' && $password == '123456') {
            return redirect('/dashboard-koordinator');
        }

        return back()->with('error', 'Email atau Password salah');
    }
}