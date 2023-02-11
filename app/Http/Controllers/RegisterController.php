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
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'passwordshow' => 'required',
            'telepon' => 'required',
        ],  
    );

    User::create([
        'name' => ($data['name']),
        'username' => ($data['username']),
        'level' => 'masyarakat',
        'password' => bcrypt($data['password']),
        'passwordshow' => ($data['password']),
        'telepon' => ($data['telepon']),
    ]);
    return redirect ('/login');
}
}
