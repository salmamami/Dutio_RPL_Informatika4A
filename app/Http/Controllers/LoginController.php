<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            // Cek status akun
            if ($user->status == 'nonaktif') {

                Auth::logout();

                return back()
                    ->with('error', 'Akun sudah tidak aktif.');
            }

            $request->session()->regenerate();


            // Redirect berdasarkan role
            if ($user->role == 'koordinator') {

                return redirect('/koordinator/dashboard');

            }


            return redirect('/dashboard');
        }


        return back()
            ->with('error', 'Email atau Password salah');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect('/login');
    }
}