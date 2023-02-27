<?php

namespace App\Http\Controllers;
use App\Models\Lelang;
use App\Models\Barang;
use App\Models\HistoryLelang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lelangs = Lelang::orderBy('created_at','desc')->get();
        $barangs = Barang::select('id', 'nama_barang', 'harga_awal')
                    ->whereNotIn('id', function($query)
                    {
                        $query->select('barangs_id')->from('lelangs');
                    })->get();
        return view('lelang.index', compact('lelangs','barangs'));
    }
    public function cetaklelang()
    {
        //
        $cetaklelangs = Lelang::all();
        return view('lelang.cetaklelang', compact('cetaklelangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barangs = Barang::select('id', 'nama_barang', 'harga_awal')
                    ->whereNotIn('id', function($query)
                    {
                        $query->select('barangs_id')->from('lelangs');
                    })->get();
        return view('lelang.create', compact('barangs'));
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
        $request->validate(
            [
                'barangs_id'         => 'required|exists:barangs,id|unique:lelangs,barangs_id',
                'tanggal_lelang'    => 'required|date',
            ],
            [
                'barang_id.required'        => 'Barang Harus Diisi',
                'barang_id.exists'          => 'Barang Tidak Ada Pada Data Barang',
                'barang_id.unique'          => 'Barang Sudah Di Lelang',
                'tanggal_lelang.required'   => 'Tanggal Lelang Harus Diisi',
                'tanggal_lelang.date'       => 'Tanggal Lelang Harus Berupa Tanggal',
                
            ]
        );
        $lelang = new Lelang;
        $lelang->barangs_id = $request->barangs_id;
        $lelang->tanggal_lelang = $request->tanggal_lelang;
        $lelang->harga_akhir = '0';
        $lelang->pemenang = 'Belum Ada';
        $lelang->users_id = Auth::user()->id;
        $lelang->status = 'dibuka';
        $lelang->save();

        return redirect()->route('lelangpetugas.index')->with('success','Data lelang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function show(Lelang $lelang)
    {
        //
        $historyLelangs = HistoryLelang::orderBy('harga', 'desc')->get()->where('lelang_id',$lelang->id);
        $lelangs = Lelang::find($lelang->id);
        return view('lelang.show', compact('lelangs','historyLelangs'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function edit(Lelang $lelang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lelang $lelang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lelang $lelang)
    {
    $lelangs = Lelang::find($lelang->id);

    if ($lelangs) {
        $lelangs->delete();
        return redirect()->route('lelangpetugas.index')->with('deletesuccess', 'Data Lelang Berhasil Dihapus');
    } else {
        return redirect()->route('lelangpetugas.index')->with('deletefailed', 'Data Lelang Gagal Dihapus');
    }
    }


    /** METHODS LIST LELANG UNTUK LEVEL MASYARAKAT */ 
    public function listlelang(Lelang $lelang)
    {
        $lelangs = Lelang::all();
        $barangs = Barang::all();
        return view('listlelang.indexbaru', compact('lelangs'));
    }
    public function penawaran(Lelang $lelang)
    {
        $lelangs = Lelang::all();
        $barangs = Barang::all();
        return view('listlelang.penawaran', compact('lelangs','barangs'));
    }
    public function penawaranshow(Lelang $lelang)
    {
        //
        $barangs = Barang::find($barang->id);
        $lelangs = Lelang::find($lelang->id);
        return view('listlelang.penawaran', compact('barangs','lelangs'));

    }
}
