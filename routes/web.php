<?php

use App\Http\Controllers\bukuController;
use App\Http\Controllers\penggunaController;
use Illuminate\Support\Facades\Route;

Route::get('/pengguna', [penggunaController::class, 'index']);
Route::resource('buku', bukuController::class);

Route::get('/', function () {
    return view('welcome');
});
