<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\transaksi;
use App\Models\detailTransaksi; 

class strukController extends Controller
{
    public function generateStruk($id_transaksi)
    {
       $transaksi = transaksi::with('detailTransaksi.buku','pengguna')->findOrFail($id_transaksi);
        $pdf = Pdf::loadView('kasir.generateStruk', compact('transaksi'))->setPaper([0, 0, 260, 1000]);

        return $pdf->download('BookShop-Struk.pdf');

    } 
}
