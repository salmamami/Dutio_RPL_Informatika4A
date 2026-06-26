<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'koordinator') {
            return view('koordinator.index', compact('user'));
        }

        return view('user.index', compact('user'));
    }
}