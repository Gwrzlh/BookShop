<?php

use App\Http\Controllers\bukuController;
use App\Http\Controllers\kasirController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\penggunaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\transaksiController;
use App\Http\Middleware\checkUser;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Support\Facades\Session;
use App\Models\transaksi;
use App\Http\Controllers\ownerController;
use App\Http\Controllers\strukController;

Route::resource('pengguna', penggunaController::class);
Route::resource('transaksi', transaksiController::class);
Route::resource('kasir', kasirController::class);
Route::resource('buku', bukuController::class);
Route::post('kasir/buku/{id_buku}', [kasirController::class, 'tambahKeKeranjang'])->name('tambahkeranjang');
Route::post('kasir/hapusdarikeranjang/{id_buku}', [kasirController::class, 'hapusDariKeranjang'])->name('hapuskeranjang');
Route::resource('kategori',kategoriController::class);

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
    Route::get('/owner',[ownerController::class,'index'])->name('owner');
});
Route::middleware(['checkRole:Kasir'])->group(function(){
    Route::get('/kasir',[kasirController::class, 'index'])->name('kasir');
});

Route::get('/transaksi/{id}/struk', [strukController::class, 'generateStruk'])->name('GenerateStruk');
Route::get('/struk/{id_transaksi}', [kasirController::class, 'struk'])->name('Struk');

Route::post('/clear-id-transaksi', function () {
    session()->forget('id_transaksi');
})->name('ClearIdTransaksi');

// adminroute

Route::get('/admin/buku', [bukuController::class, 'index'])->name('admin.buku');

Route::get('/admin/kasir',[transaksiController::class,'index'])->name('admin.transaksi');

Route::get('/admin/pengguna',[penggunaController::class,'index'])->name('admin.pengguna');

Route::get('/admin/kategori',[kategoriController::class,'index'])->name('admin.kategori');

// Route::middleware(['checkRole:Kasir'])->group(function () {
//     Route::get('/kasir', function () {
//         return view('kasir.create');
//     })->name('kasir');
// });




