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
use App\Http\Controllers\ReportController;


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

    // Controller Register
    Route::controller(RegisterController::class)->group(function() {
// ROUTE REGISTER
Route::get('register', 'view')->name('register')->middleware('guest');
Route::post('register', 'store')->name('register-store')->middleware('guest');
    });

    // Controller Login
    Route::controller(LoginController::class)->group(function() {
// ROUTE LOGIN
Route::get('login', 'view')->name('login')->middleware('guest');
Route::get('register', 'register')->name('login.register')->middleware('guest');
Route::post('login', 'proses')->name('login.proses')->middleware('guest');
// ROUTE LOGOUT
Route::get('logout', 'logout')->name('logout.admin');
Route::get('logoutdashboard', 'logoutdashboard')->name('logout.dashboard');
    });

    // Controller Dashboard
    Route::controller(DashboardController::class)->group(function() {
// ROUTE DASHBOARD
Route::get('/dashboard/admin', 'admin')->name('dashboard.admin')->middleware('auth','level:admin');
Route::get('/dashboard/petugas', 'petugas')->name('dashboard.petugas')->middleware('auth','level:petugas,admin');
Route::get('/dashboard', 'masyarakat')->name('dashboard.masyarakat')->middleware('auth','level:masyarakat');
    });
Route::view('errorr/403', 'error.403')->name('error.403');

// ROUTE LIST LELANG
Route::get('/dashboard/masyarakat/listlelang', [ListController::class, 'index'])->name('listlelang.index')->middleware('auth','level:masyarakat');

// ROUTE MASYARAKAT
Route::get('list-lelang', [MasyarakatController::class, 'listlelang'])->name('masyarakat.listlelang')->middleware('auth','level:masyarakat');
Route::get('data-penawaran-anda', [MasyarakatController::class, 'index'])->name('masyarakatlelang.index')->middleware('auth', 'level:masyarakat');
Route::resource('masyarakat', MasyarakatController::class)->middleware('auth', 'level:admin');

    // Controller User
    Route::controller(UserController::class)->group(function() {
// ROUTE USER
Route::post('/admin/operator/create', 'store')->name('user.store')->middleware('auth','level:admin');
Route::get('/admin/operator/create', 'create')->name('user.create')->middleware('auth','level:admin');
Route::get('/admin/users', 'index')->name('user.index')->middleware('auth','level:admin');
Route::get('/admin/users/{user}/edit', 'edit')->name('user.edit')->middleware('auth','level:admin');
Route::get('/admin/users/{user}', 'show')->name('user.show')->middleware('auth','level:admin');
Route::delete('/admin/users/{user}', 'destroy')->name('user.destroy')->middleware('auth','level:admin');
Route::put('/admin/users/{user}', 'update')->name('user.update')->middleware('auth','level:admin');
Route::get('profile', 'profile')->name('profile.index')->middleware('auth','level:admin,petugas,masyarakat');
Route::put('profile', 'updateprofile')->name('user.updateprofile')->middleware('auth','level:admin,petugas,masyarakat');
Route::get('profile', 'editprofile')->name('user.editprofile')->middleware('auth','level:admin,petugas,masyarakat');
    });

    // Controller Barang
    Route::controller(BarangController::class)->group(function() {
// ROUTE BARANG
Route::get('/', 'home')->name('home');
Route::put('barang/{barang}', 'update')->name('barang.update')->middleware('auth', 'level:petugas,admin');
Route::put('admin/barang/{barang}', 'update')->name('barangmin.update')->middleware('auth', 'level:admin');
Route::get('petugas/barang/{barang}', 'show')->name('barang.show')->middleware('auth', 'level:petugas');
Route::get('admin/barang/{barang}', 'show')->name('barangmin.show')->middleware('auth', 'level:admin');
Route::delete('barang/{barang}', 'destroy')->name('barang.destroy')->middleware('auth', 'level:petugas,admin');
Route::get('petugas/barang/{barang}/edit', 'edit')->name('barang.edit')->middleware('auth', 'level:petugas');
Route::get('admin/barang/{barang}/edit', 'edit')->name('barangmin.edit')->middleware('auth', 'level:admin');
Route::post('barang/', 'store')->name('barang.store')->middleware('auth', 'level:petugas,admin');
Route::get('barang/', 'index')->name('barang.index')->middleware('auth', 'level:petugas,admin');
Route::get('admin/barang/', 'index')->name('barangmin.index')->middleware('auth', 'level:admin');
Route::get('petugas/barang', 'index')->name('baranggas.index')->middleware('auth', 'level:petugas');
Route::get('barang/create', 'create')->name('barang.create')->middleware('auth', 'level:admin,petugas');
    });

    // Controller Lelang
    Route::controller(LelangController::class)->group(function() {
// ROUTE LELANG
Route::get('masyarakat/lelang', 'listlelang')->name('lelang.listlelang')->middleware('auth', 'level:masyarakat');
Route::get('listlelang', 'listlelang')->name('lelang.listlelang')->middleware('auth', 'level:masyarakat,admin,petugas');
Route::get('petugas/lelang', 'index')->name('lelangpetugas.index')->middleware('auth', 'level:petugas');
Route::get('petugas/lelang/create', 'create')->name('lelang.create')->middleware('auth', 'level:petugas');
Route::post('petugas/lelang', 'store')->name('lelang.store')->middleware('auth', 'level:petugas');
Route::get('/menawar/{lelang}', 'show')->name('lelangin.show')->middleware('auth','level:masyarakat');
Route::get('/petugas/lelang/{lelang}', 'show')->name('lelangpetugas.show')->middleware('auth','level:petugas');
Route::put('/petugas/lelang/{lelang}', 'update')->name('lelang.update')->middleware('auth','level:petugas');
Route::get('/admin/lelang/{lelang}', 'show')->name('lelangadmin.show')->middleware('auth','level:admin');
Route::get('/cetak-lelang', 'cetaklelang')->name('cetak.lelang')->middleware('auth','level:admin,petugas');
Route::get('/cetak-penawaran/{lelang}', 'cetakpenawaran')->name('cetak.penawaran')->middleware('auth','level:admin,petugas');
Route::delete('/petugas/lelang/', 'destroy')->name('lelang.destroy')->middleware('auth','level:petugas');
    });

    // Controller HistoryLelang
    Route::controller(HistoryLelangController::class)->group(function() {
//ROUTE HISTORY LELANG
Route::get('/menawar/{lelang}', 'create')->name('lelangin.create')->middleware('auth','level:masyarakat');
Route::get('cetak-history', 'cetakhistory')->name('cetak.history')->middleware('auth','level:petugas,admin');
Route::get('/data-penawaran', 'index')->name('datapenawar.index')->middleware('auth','level:petugas,admin');
Route::post('/menawar/{lelang}', 'store')->name('lelangin.store')->middleware('auth','level:masyarakat');
Route::post('/komentar/{lelang}', 'storecomments')->name('lelangin.storecomments')->middleware('auth','level:masyarakat,petugas,admin');
Route::delete('/data-penawaran/{lelang}', 'destroy')->name('lelangin.destroy')->middleware('auth','level:petugas');
Route::put('/lelangpetugas/{id}/pemenang', 'setPemenang')->name('lelangpetugas.setpemenang');
    });

    Route::controller(ReportController::class)->group(function() {
        Route::get('generate-pdfall', 'generatePdf')->name('generatePdf');
        Route::get('generate-pdfpemenang', 'generatePdfpemenang')->name('generatePdf.pemenang');
        Route::get('generate-pdfpending', 'generatePdfpending')->name('generatePdf.pending');
        Route::get('generate-pdfgugur', 'generatePdfgugur')->name('generatePdf.gugur');
        Route::get('cetak-history-all', 'cetakhistoryall')->name('cetakhistoryall')->middleware('auth','level:petugas,admin');
        Route::get('cetak-history-pemenang', 'cetakhistorypemenang')->name('cetakhistorypemenang')->middleware('auth','level:petugas,admin');
        Route::get('cetak-history-pending', 'cetakhistorypending')->name('cetakhistorypending')->middleware('auth','level:petugas,admin');
        Route::get('cetak-history-gugur', 'cetakhistorygugur')->name('cetakhistorygugur')->middleware('auth','level:petugas,admin');
    });
