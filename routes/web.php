<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasyarakatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ROUTE REGISTER
Route::get('register', [RegisterController::class, 'view'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register-store')->middleware('guest');

// ROUTE LOGIN
Route::get('login', [LoginController::class, 'view'])->name('login')->middleware('guest');
Route::get('register', [LoginController::class, 'register'])->name('login.register')->middleware('guest');
Route::post('login', [LoginController::class, 'proses'])->name('login.proses')->middleware('guest');

// ROUTE LOGOUT
Route::get('logout', [LoginController::class, 'logout'])->name('logout.admin');

// ROUTE DASHBOARD
Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin')->middleware('auth','level:admin');
Route::get('/dashboard/petugas', [DashboardController::class, 'petugas'])->name('dashboard.petugas')->middleware('auth','level:petugas,admin');
Route::get('/dashboard/masyarakat', [DashboardController::class, 'masyarakat'])->name('dashboard.masyarakat')->middleware('auth','level:masyarakat');
Route::view('errorr/403', 'error.403')->name('error.403');

// ROUTE LIST LELANG
Route::get('/dashboard/masyarakat/listlelang', [ListController::class, 'index'])->name('listlelang.index')->middleware('auth','level:masyarakat');

// ROUTE MASYARAKAT
Route::get('admin/masyarakat', [MasyarakatController::class, 'index'])->name('masyarakat.index')->middleware('auth', 'level:admin');
Route::resource('masyarakat', MasyarakatController::class)->middleware('auth', 'level:admin');

// ROUTE USER
Route::post('/admin/operator/create', [UserController::class, 'store'])->name('user.store')->middleware('auth','level:admin');
Route::get('/admin/operator/create', [UserController::class, 'create'])->name('user.create')->middleware('auth','level:admin');
Route::get('/admin/operator', [UserController::class, 'index'])->name('index')->middleware('auth','level:admin');
Route::resource('user', UserController::class)->middleware('auth', 'level:admin');

// ROUTE BARANG
Route::resource('barang', BarangController::class)->middleware('auth', 'level:petugas');
Route::get('petugas/barang', [BarangController::class, 'index'])->name('barang.index')->middleware('auth', 'level:petugas');
Route::get('admin/barang', [BarangController::class, 'index'])->name('barang')->middleware('auth', 'level:admin');
Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create')->middleware('auth', 'level:admin,petugas');

// ROUTE LELANG
Route::get('masyarakat/lelang', [LelangController::class, 'listlelang'])->name('lelang.listlelang')->middleware('auth', 'level:masyarakat');
Route::get('listlelang', [LelangController::class, 'listlelang'])->name('lelang.listlelang')->middleware('auth', 'level:masyarakat,admin,petugas');
Route::get('petugas/lelang', [LelangController::class, 'index'])->name('lelang')->middleware('auth', 'level:petugas');
Route::get('petugas/lelang/create', [LelangController::class, 'create'])->name('lelang.create')->middleware('auth', 'level:petugas');
Route::post('petugas/lelang', [LelangController::class, 'store'])->name('lelang.store')->middleware('auth', 'level:petugas');
