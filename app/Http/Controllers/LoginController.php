<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function view()
    {
        return view('auth.login');
    }
    public function proses(Request $request)
    {
        $user = $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ],
        [
            'username.required' => 'Silahakan isi username',
            'password.required' => 'Silahakan isi password',
            'username.exists'   => 'Username anda salah'
        ]
        
    );

        if (Auth::attempt($user))
        {
            $request->session()->regenerate();
            $user = Auth::user();
            
            if ($user->level == 'admin')
            {
                return redirect()->route('dashboard.admin')->with('success','');
            }else if ($user->level == 'petugas')
            {
                return redirect()->route('dashboard.petugas')->with('success','');
            }else if ($user->level == 'masyarakat')
            {
                return redirect()->route('dashboard.masyarakat')->with('success','');
            }else {
                return redirect()->route('login');
            }
        }
        return back()->withErrors([
            'username' => 'Username Anda Salah',
            'password' => 'Password Anda Salah',
        ])->onlyInput('username');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
    public function logoutdashboard(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
