<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\HistoryLelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        $usersadmin = User::all()->where('level', 'admin');
        $userspetugas = User::all()->where('level', 'petugas');
        $usersmasyarakat = User::all()->where('level','masyarakat');
        return view('user.index', compact('users','usersadmin','userspetugas','usersmasyarakat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|unique:users,name|min:3|max:50',
            'username' => 'required|unique:users,username|max:15',
            'level' => 'required',
            'password' => 'required|min:4',
            'passwordshow' => 'required|same:password',
            'telepon' => 'required|max:15',
        ],  
        [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama terlalu pendek',
            'name.unique' => 'Nama sudah terdaftar',
            'username.required' => 'Username tidak boleh kosong',
            'level.required' => 'Level tidak boleh kosong',
            'username.unique' => 'Username sudah terdaftar',
            'username.max' => 'Username terlalu panjang',
            'password.required' => 'Password tidak boleh kosong',
            'passwordshow.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password terlalu pendek',
            'passwordshow.same' => 'Password tidak sama',
            'telepon.max' => 'No telp terlalu panjang',
            'telepon.required' => 'No telp tidak boleh kosong',
        ]
    );

        User::create([
            'name' => ($data['name']),
            'username' => ($data['username']),
            'level' => ($data['level']),
            'password' => bcrypt($data['password']),
            'passwordshow' => ($data['passwordshow']),
            'telepon' => ($data['telepon']),
        ]);
        return redirect ('/admin/users')->with('success','Data Akun Berhasil Dibuat');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $historyLelangs = HistoryLelang::all();
        $users = User::find($user->id);
        return view('user.show', compact('users','historyLelangs'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $users = User::find($user->id);
        return view('user.edit', compact('users'));
    }
    public function editprofile(User $user)
    {
        //
        $historyLelangs = HistoryLelang::all();
        $user = auth()->user(); 
        return view('profile.index', compact('user','historyLelangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        //
        $rules = $request->validate([
            'level' => 'required',
            'telepon' => 'required|max:15',
        ],
        [
            'name.required' => 'Nama tidak boleh kosong',
            'name.unique' => 'Nama sudah terdaftar',
            'name.min' => 'Nama terlalu pendek',
            'username.required' => 'Username tidak boleh kosong',
            'level.required' => 'Level tidak boleh kosong',
            'username.unique' => 'Username sudah terdaftar',
            'username.max' => 'Username terlalu panjang',
            'telepon.max' => 'No telp terlalu panjang',
            'telepon.required' => 'No telp tidak boleh kosong',
        ]
    
    );
        if($request->name != $user->name) {
            $rules['name'] = 'required|unique:users,name|min:3|max:50';
        }
        elseif($request->username != $user->username) {
            $rules['name'] = 'required|unique:users,username|max:15';
        }

        $users = User::find($user->id);
        $users->name = $request->name;
        $users->username = $request->username;
        $users->level = $request->level;
        $users->telepon = $request->telepon;
        $users->update(); 
        return redirect()->route('user.index')->with('editsuccess','Data Akun Berhasil Diedit');
    }

    
    public function updateprofile(Request $request,User $user)
    {
        //
        $request->validate([
            'password' => 'nullable|string|min:4',
            'passwordshow' => 'nullable|string|same:password',
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
    if($request->name != $user->name) {
        $rules['name'] = 'required|unique:users,name|min:3|max:50';
    }
    elseif($request->username != $user->username) {
        $rules['name'] = 'required|unique:users,username|max:15';
    }
    $user = auth()->user(); // Ambil data pengguna yang sedang login
    $user->name = $request->input('name');
    $user->telepon = $request->input('telepon');
    $user->username = $request->input('username');

        // Mengunggah file foto profil baru
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('post-images', $filename);
        $user->photo = $filename;
    }

    if ($request->has('password')) {
        $user->password = bcrypt($request->input('password'));
    }elseif ($request->has('passwordshow')) {
        $user->passwordshow = $request->input('passwordshow');
    }
    $user->save();
    return redirect()->route('user.editprofile')->with('success', 'Profil berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $users = User::find($user->id);
        $users->delete();
        return redirect()->route('user.index')->with('deletesuccess','Data Akun Berhasil Dihapus')->with('success','Data Akun Berhasil Terhapus');
    }
}
