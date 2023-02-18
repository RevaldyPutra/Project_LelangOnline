<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lelang;
use App\Models\User;
use App\Models\HistoryLelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }
    public function home()
    {
        //
        $barangsss = DB::table('barangs')->count();
        $lelangsss = DB::table('lelangs')->count();
        $historylelangs = DB::table('history_lelangs')->count();
        $penawar = DB::table('users')->where('level', 'masyarakat')->count();
        $barangs = Barang::all();
        $lelangs = Lelang::all();
        return view('home', compact('barangs','lelangs'))->with(['totalpenawaran'=>$historylelangs,'totalbarang'=>$barangsss,'totallelang'=>$lelangsss,'totaluser'=>$penawar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barangs = Barang::all();
        return view('barang.create', compact('barangs'));
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
        $validateData = $request->validate([
            'nama_barang' => 'required',
            'tanggal' => 'required',
            'harga_awal' => 'required',
            'image' => 'image|file',
            'deskripsi_barang' => 'required'
        ],
        [
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'harga_awal.required' => 'Harga awal tidak boleh kosong',
            'deskripsi_barang.required' => 'Deskripsi barang tidak boleh kosong',
            'image.image' => 'File harus berupa gambar',
        ]
    );

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }
        // Barang::create([
        //     'nama_barang' => $request->nama_barang,
        //     'tanggal' => $request->tanggal,
        //     'harga_awal' => $request->harga_awal,
        //     'deskripsi_barang' => $request->deskripsi_barang
        // ]);

        Barang::create($validateData);
        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
        $barangs = Barang::find($barang->id);
        return view('barang.show', compact('barangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
        $barangs = Barang::find($barang->id);
        return view('barang.edit', compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        //
        $request->validate([
            'nama_barang' => 'required',
            'tanggal' => 'required',
            'harga_awal' => 'required',
            'image' => 'image|file',
            'deskripsi_barang' => 'required',
        ]);

        $barangs = Barang::find($barang->id);
        $barangs->nama_barang = $request->nama_barang;
        $barangs->tanggal = $request->tanggal;
        $barangs->harga_awal = $request->harga_awal;
        $barangs->image = $request->image;
        $barangs->deskripsi_barang = $request->deskripsi_barang;
        $barangs->update();
        return redirect ('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
        $barangs = Barang::find($barang->id);
        $barangs->delete();
        return redirect('barang');
    }
}
