<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\pengguna;

class ownerController extends Controller
{
   public function index()
   {
    $transaksis = transaksi::paginate(5);
    $bukus = buku::paginate(5);
    $penggunas = pengguna::paginate(5);

    return view('owner.index', compact('transaksis', 'bukus', 'penggunas'));
   }
}
