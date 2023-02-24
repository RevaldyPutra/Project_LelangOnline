<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Lelang;
use App\Models\User;
use App\Models\HistoryLelang;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function admin()
    {
        $historyLelangs = HistoryLelang::orderBy('harga', 'desc')->get();
        $lelangs = Lelang::all();
        $barangs = DB::table('barangs')->count();
        $lelangs = DB::table('lelangs')->count();
        $historylelangs = DB::table('history_lelangs')->count();
        $users = DB::table('users')->where('level', 'petugas')->count();
        $penawars = DB::table('users')->where('level', 'masyarakat')->count();
        return view('dashboard.admin', compact('historyLelangs','lelangs'))->with(['totalpenawaran'=>$historylelangs,'totalbarang'=>$barangs,'totallelang'=>$lelangs,'totaluser'=>$users,'totalpenawar'=>$penawars]);
    }
    public function petugas(Lelang $lelang)
    {
        $lelangs = Lelang::all();
        $historyLelangs = HistoryLelang::orderBy('harga', 'desc')->get();
        $barangs = DB::table('barangs')->count();
        $lelangs = DB::table('lelangs')->count();
        $historylelangs = DB::table('history_lelangs')->count();
        $users = DB::table('users')->count();
        return view('dashboard.petugas', compact('lelangs','historyLelangs'))->with(['totalpenawaran'=>$historylelangs,'totalbarang'=>$barangs,'totallelang'=>$lelangs,'totaluser'=>$users]);
    }
    public function masyarakat(Lelang $lelang)
    {
        $lelangs =  Lelang::all();
        return view('dashboard.masyarakat', compact('lelangs'));
    }
}
