<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('role')
            ->orderBy('kamar')
            ->orderBy('name')
            ->get();

        return view(
            'koordinator.user.index',
            compact('users')
        );
    }

    public function create()
    {
        return view('koordinator.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|in:koordinator,penghuni',
            'kamar' => 'required_if:role,penghuni'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'kamar' => $request->role == 'penghuni'
                ? $request->kamar
                : null,
            'status' => 'aktif'
        ]);

        return redirect('/koordinator/user')
            ->with(
                'success',
                'Akun berhasil dibuat.'
            );
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view(
            'koordinator.user.edit',
            compact('user')
        );
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:koordinator,penghuni',
            'status' => 'required',
            'kamar' => 'required_if:role,penghuni'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
            'kamar' => $request->role == 'penghuni'
                ? $request->kamar
                : null
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('/koordinator/user')
            ->with(
                'success',
                'Akun berhasil diperbarui.'
            );
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/koordinator/user')
            ->with(
                'success',
                'Akun berhasil dihapus.'
            );
    }
}