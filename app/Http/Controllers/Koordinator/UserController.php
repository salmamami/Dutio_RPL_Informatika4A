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
        $users = User::all();

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

            'name' => 'required',
            'email' => 'required|email|unique:users',
            'kamar' => 'required',
            'password' => 'required|min:8',
            'role' => 'required'

        ]);


        User::create([

            'name' => $request->name,
            'kamar' => $request->kamar,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => 'aktif'

        ]);


        return redirect('/koordinator/user')
            ->with('success','Akun berhasil dibuat');

    }



    public function edit($id)
    {
        $user = User::findOrFail($id);


        return view(
            'koordinator.user.edit',
            compact('user')
        );
    }




    public function update(Request $request,$id)
    {

        $user = User::findOrFail($id);


        $request->validate([

            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,
            'kamar'=>'required',
            'role'=>'required',
            'status'=>'required'

        ]);



        $data = [

            'name'=>$request->name,
            'email'=>$request->email,
            'kamar'=>$request->kamar,
            'role'=>$request->role,
            'status'=>$request->status

        ];



        if($request->password){

            $data['password'] = Hash::make(
                $request->password
            );

        }



        $user->update($data);



        return redirect('/koordinator/user')
            ->with('success','Akun berhasil diperbarui');

    }




    public function destroy($id)
    {

        $user = User::findOrFail($id);

        $user->delete();


        return redirect('/koordinator/user')
            ->with('success','Akun berhasil dihapus');

    }

}