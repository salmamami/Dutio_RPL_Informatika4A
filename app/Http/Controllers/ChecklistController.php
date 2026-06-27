<?php

namespace App\Http\Controllers;

class ChecklistController extends Controller
{
    public function index()
    {
        return view('checklist.index');
    }
}