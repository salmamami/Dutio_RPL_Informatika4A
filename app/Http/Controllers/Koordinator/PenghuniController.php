<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penghuni;
use App\Models\User;

class PenghuniController extends Controller
{
    public function index()
    {
        $penghunis = Penghuni::with('user')
            ->orderBy('user_id')
            ->orderBy('nama_penghuni')
            ->get();

        return view('koordinator.penghuni.index', compact('penghunis'));
    }

    public function create()
    {
        $users = User::where('role', 'penghuni')
            ->orderBy('kamar')
            ->get();

        return view('koordinator.penghuni.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_penghuni' => 'required',
        ]);


        $user = User::findOrFail($request->user_id);


        Penghuni::create([
            'user_id' => $user->id,
            'nama_penghuni' => $request->nama_penghuni,
            'kamar' => $user->kamar,
        ]);


        return redirect()
            ->route('koordinator.penghuni.index')
            ->with('success', 'Data penghuni berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $penghuni = Penghuni::findOrFail($id);

        $users = User::where('role', 'penghuni')
            ->orderBy('kamar')
            ->get();

        return view('koordinator.penghuni.edit', compact('penghuni', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_penghuni' => 'required|string|max:255',
            'kamar' => 'required',
        ]);


        $penghuni = Penghuni::findOrFail($id);


        $penghuni->update([
            'user_id' => $request->user_id,
            'nama_penghuni' => $request->nama_penghuni,
            'kamar' => $request->kamar,
        ]);


        return redirect()
            ->route('koordinator.penghuni.index')
            ->with('success','Data penghuni berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penghuni = Penghuni::findOrFail($id);

        $penghuni->delete();

        return redirect('/koordinator/penghuni')
            ->with('success', 'Data penghuni berhasil dihapus.');
    }
}