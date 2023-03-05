<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function view()
    {
        return view('auth.register');
    }
    
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:50',
            'username' => 'required|unique:users,username|max:15|min:3',
            'password' => 'required|min:4',
            'passwordshow' => 'required|same:password',
            'telepon' => 'required|max:15|min:5',
        ],
        [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama terlalu pendek',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah terdaftar',
            'username.max' => 'Username terlalu panjang',
            'username.min' => 'Username terlalu pendek',
            'password.required' => 'Password tidak boleh kosong',
            'passwordshow.required' => 'Password tidak boleh kosong',
            'passwordshow.same' => 'Password tidak sama',
            'password.min' => 'Password terlalu pendek',
            'telepon.max' => 'No telp terlalu panjang',
            'telepon.min' => 'No telp terlalu pendek',
            'telepon.required' => 'No telp tidak boleh kosong',
        ]
    );

    User::create([
        'name' => ($data['name']),
        'username' => ($data['username']),
        'level' => 'masyarakat',
        'password' => bcrypt($data['password']),
        'passwordshow' => ($data['password']),
        'telepon' => ($data['telepon']),
    ]);
    return redirect()->route('login')->with('success','Registrasi Berhasil!');
}
}



?>