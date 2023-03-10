<?php

namespace App\Http\Controllers;

use App\Models\HistoryLelang;
use App\Models\Lelang;
use App\Models\Barang;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


class HistoryLelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $historyLelangs = HistoryLelang::orderBy('harga', 'desc')->get();
        $historyLelangsPemenang = HistoryLelang::orderBy('harga', 'desc')->get()->where('status','pemenang');
        $historyLelangsPending = HistoryLelang::orderBy('harga', 'desc')->get()->where('status','pending');
        $historyLelangsGugur = HistoryLelang::orderBy('harga', 'desc')->get()->where('status','gugur');
        $lelangs = Lelang::all();
        
        return view('lelang.datapenawaran', compact('historyLelangs','historyLelangsPemenang','historyLelangsPending','historyLelangsGugur','lelangs'));
    }
    public function cetakhistory()
    {
        //
        $cetakhistoryLelangs = HistoryLelang::orderBy('harga', 'desc')->get();
        $cetakhistoryLelangsPemenang = HistoryLelang::orderBy('harga', 'desc')->get()->where('status','pemenang');
        $cetakhistoryLelangsPending = HistoryLelang::orderBy('harga', 'desc')->get()->where('status','pending');
        $cetakhistoryLelangsGugur = HistoryLelang::orderBy('harga', 'desc')->get()->where('status','gugur');
        return view('lelang.cetakhistory', compact('cetakhistoryLelangs','cetakhistoryLelangsPemenang','cetakhistoryLelangsPending','cetakhistoryLelangsGugur'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(HistoryLelang $historyLelang, Lelang $lelang)
    {
        //
        $comments = Comment::orderBy('created_at', 'desc')->get()->where('lelang_id',$lelang->id);
        $lelangs = Lelang::find($lelang->id);
        $historyLelangs = HistoryLelang::orderBy('harga', 'desc')->get()->where('lelang_id',$lelang->id);
        return view('masyarakat.penawaran', compact('lelangs', 'historyLelangs','comments'));
    }

    public function storecomments(Lelang $lelang,Request $request)
    {
        //
        $request->validate([
            'komentar' => 'required',
        ]);

        $komentar = new Comment;
        $komentar->nama = Auth::user()->name;
        $komentar->komentar = $request->komentar;
        $komentar->lelang_id = $lelang->id;
        $komentar->users_id = Auth::user()->id;
        $komentar->save();



        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,HistoryLelang $historyLelang, Lelang $lelang, Barang $barang)
    {
        //
        // ddd($request);
        $validatedData = $request->validate([
            'harga_penawaran' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) use ($lelang) {
                    if ($value <= $lelang->barang->harga_awal) {
                        $message = "Harga penawaran harus lebih besar dari harga awal yaitu " . "Rp " . number_format($lelang->barang->harga_awal, 0, ',', '.');
                        Alert::error('Error', $message);
                        return $fail($message);
                    }
                },
            ],
        ], 
        [
            'harga_penawaran.required' => "Harga penawaran harus diisi",
            'harga_penawaran.numeric' => "Harga penawaran harus berupa angka",
        ]);

        $historyLelang = new Historylelang();
        $historyLelang->lelang_id = $lelang->id;
        $historyLelang->barang_id = $lelang->barang->id;
        $historyLelang->users_id = Auth::user()->id;
        $historyLelang->harga = $request->harga_penawaran;
        $historyLelang->status = 'pending';
        $historyLelang->save();

        return redirect()->route('lelangin.create', $lelang->id)->with('success', 'Anda Berhasil Menawar Barang Ini')->with('ucapan','');
    }

    public function setPemenang(Lelang $lelang, $id)
    {
    // Mengambil data history lelang berdasarkan id
    $historyLelang = HistoryLelang::findOrFail($id);

    // Mengubah status pada history lelang menjadi 'pemenang'
    $historyLelang->status = 'pemenang';
    $historyLelang->save();

    HistoryLelang::where('lelang_id', $historyLelang->lelang_id)
    ->where('status', 'pending')
    ->where('id', '<>', $historyLelang->id)
    ->update(['status' => 'gugur']);

    // Mengambil data lelang berdasarkan history lelang
    $lelang = $historyLelang->lelang;

    // Mengubah status pada lelang menjadi 'ditutup'
    $lelang->status = 'ditutup';
    $lelang->pemenang = $historyLelang->user->name;
    $lelang->harga_akhir = $historyLelang->harga;
    $lelang->save();

    return redirect()->back()->with('success', 'Pemenang berhasil dipilih!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryLelang $historyLelang)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryLelang $historyLelang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryLelang $historyLelang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryLelang $historyLelang)
    {
        //
        // $historyLelangs = HistoryLelang::find($historyLelang->id);
        $historyLelang->delete();
        // if(empty($historyLelang)) {
        //     return;
        // }
        return redirect()->route('datapenawar.index');
    }
}
