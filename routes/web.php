<?php

use App\Http\Controllers\bukuController;
use App\Http\Controllers\kasirController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\penggunaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\transaksiController;
use App\Http\Middleware\checkUser;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Support\Facades\Session;
use App\Models\transaksi;

Route::resource('pengguna', penggunaController::class);
Route::resource('buku', bukuController::class);
Route::resource('transaksi', transaksiController::class);
Route::resource('kasir', kasirController::class);
Route::post('kasir/buku/{id_buku}', [kasirController::class, 'tambahKeKeranjang'])->name('tambahkeranjang');
Route::post('kasir/hapusdarikeranjang/{id_buku}', [kasirController::class, 'hapusDariKeranjang'])->name('hapuskeranjang');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/admin', function () {
//     return view('admin.index');
// })->name('admin');

Route::get('/', function () {
   return view('login.index');
});

//Login route
// Login route
Route::middleware(['preventBack'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
});


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['checkRole:Admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');
});
Route::middleware(['checkRole:Owner'])->group(function () {
    Route::get('/Owner', function () {
        return view('owner.index');
    })->name('owner');
});
// Route::middleware(['checkRole:Kasir'])->group(function () {
//     Route::get('/kasir', function () {
//         return view('kasir.create');
//     })->name('kasir');
// });




