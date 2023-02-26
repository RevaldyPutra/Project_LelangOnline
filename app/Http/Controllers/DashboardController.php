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
        $barangs = Barang::all();
        $users = User::all();
        $lelangs = Lelang::all();
        $historylelangs = HistoryLelang::all();
        $historyLelangs = HistoryLelang::orderBy('harga', 'desc')->get();
        return view('dashboard.admin', compact('historyLelangs','lelangs','barangs','users'));
    }
    public function petugas(Lelang $lelang)
    {
        $barangs = Barang::all();
        $users = User::all();
        $lelangs = Lelang::all();
        $historylelangs = HistoryLelang::all();
        $historyLelangs = HistoryLelang::orderBy('harga', 'desc')->get();
        return view('dashboard.petugas', compact('historyLelangs','lelangs','barangs','users'));
    }
    public function masyarakat(Lelang $lelang)
    {
        $lelangs =  Lelang::all();
        return view('dashboard.masyarakat', compact('lelangs',));
    }
}
