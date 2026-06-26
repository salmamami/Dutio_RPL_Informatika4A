<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'koordinator') {
                return redirect('/dashboard-koordinator');
            } else {
                return redirect('/dashboard-user');
            }
        }

        return back()->with('error', 'Email atau Password salah');
    }
}