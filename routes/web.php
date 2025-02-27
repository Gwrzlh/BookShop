<?php

use App\Http\Controllers\bukuController;
use App\Http\Controllers\penggunaController;
use Illuminate\Support\Facades\Route;

Route::resource('pengguna', penggunaController::class);
Route::resource('buku', bukuController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');