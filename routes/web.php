<?php

use App\Http\Controllers\penggunaController;
use Illuminate\Support\Facades\Route;

Route::get('/pengguna', [penggunaController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
