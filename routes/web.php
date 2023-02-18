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
use App\Http\Controllers\HistoryLelangController;

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

// Route::get('/', function () {return view('home');
// });
Route::get('/', [BarangController::class, 'home'])->name('home');

// ROUTE REGISTER
Route::get('register', [RegisterController::class, 'view'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register-store')->middleware('guest');

// ROUTE LOGIN
Route::get('login', [LoginController::class, 'view'])->name('login')->middleware('guest');
Route::get('register', [LoginController::class, 'register'])->name('login.register')->middleware('guest');
Route::post('login', [LoginController::class, 'proses'])->name('login.proses')->middleware('guest');

// ROUTE LOGOUT
Route::get('logout', [LoginController::class, 'logout'])->name('logout.admin');
Route::get('logoutdashboard', [LoginController::class, 'logoutdashboard'])->name('logout.dashboard');


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
Route::get('/admin/users', [UserController::class, 'index'])->name('index')->middleware('auth','level:admin');
Route::get('profile', [UserController::class, 'profile'])->name('profile.index')->middleware('auth','level:admin,petugas,masyarakat');
Route::post('profile/update', [UserController::class, 'updateprofile'])->name('user.updateprofile')->middleware('auth','level:admin,petugas,masyarakat');
Route::put('profile/update', [UserController::class, 'updateprofile'])->name('user.updateprofile')->middleware('auth','level:admin,petugas,masyarakat');
Route::get('profile', [UserController::class, 'editprofile'])->name('user.editprofile')->middleware('auth','level:admin,petugas,masyarakat');
Route::resource('user', UserController::class)->middleware('auth');

// ROUTE BARANG
// Route::resource('barang', BarangController::class)->middleware('auth', 'level:petugas');
Route::put('petugas/barang/{barang}', [BarangController::class, 'update'])->name('barang.update')->middleware('auth', 'level:petugas');
Route::get('petugas/barang/{barang}', [BarangController::class, 'show'])->name('barang.show')->middleware('auth', 'level:petugas');
Route::delete('barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy')->middleware('auth', 'level:petugas');
Route::get('petugas/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit')->middleware('auth', 'level:petugas');
Route::post('barang/', [BarangController::class, 'store'])->name('barang.store')->middleware('auth', 'level:petugas');
Route::get('petugas/barang', [BarangController::class, 'index'])->name('barang.index')->middleware('auth', 'level:petugas');
Route::get('admin/barang', [BarangController::class, 'index'])->name('barang')->middleware('auth', 'level:admin');
Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create')->middleware('auth', 'level:admin,petugas');

// ROUTE LELANG
Route::get('masyarakat/lelang', [LelangController::class, 'listlelang'])->name('lelang.listlelang')->middleware('auth', 'level:masyarakat');
Route::get('listlelang', [LelangController::class, 'listlelang'])->name('lelang.listlelang')->middleware('auth', 'level:masyarakat,admin,petugas');
Route::get('petugas/lelang', [LelangController::class, 'index'])->name('lelangpetugas.index')->middleware('auth', 'level:petugas');
Route::get('petugas/lelang/create', [LelangController::class, 'create'])->name('lelang.create')->middleware('auth', 'level:petugas');
Route::post('petugas/lelang', [LelangController::class, 'store'])->name('lelang.store')->middleware('auth', 'level:petugas');
// Route::get('lelang/show', [LelangController::class, 'show'])->name('lelang.show')->middleware('auth', 'level:petugas');
Route::resource('lelang', LelangController::class)->middleware('auth', 'level:petugas');
Route::get('/menawar/{lelang}', [LelangController::class, 'show'])->name('lelangin.show')->middleware('auth','level:masyarakat');
Route::get('/petugas/lelang/{lelang}', [LelangController::class, 'show'])->name('lelangpetugas.show')->middleware('auth','level:petugas');
Route::get('/admin/lelang/{lelang}', [LelangController::class, 'show'])->name('lelangadmin.show')->middleware('auth','level:admin');
Route::get('/admin/lelang/', [LelangController::class, 'index'])->name('lelangadmin.index')->middleware('auth','level:admin');

//ROUTE HISTORY LELANG
Route::get('/menawar/{lelang}', [HistoryLelangController::class, 'create'])->name('lelangin.create')->middleware('auth','level:masyarakat');
Route::get('/data-penawaran', [HistoryLelangController::class, 'index'])->name('datapenawar.index')->middleware('auth','level:petugas');
Route::post('/menawar/{lelang}', [HistoryLelangController::class, 'store'])->name('lelangin.store')->middleware('auth','level:masyarakat');
Route::delete('/data-penawaran/{lelang}', [HistoryLelangController::class, 'destroy'])->name('lelangin.destroy')->middleware('auth','level:petugas');
