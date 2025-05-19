<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\detailTransaksi;

class riwayatController extends Controller
{
    public function index(Request $request)
    {
        $query = transaksi::with('detailTransaksi.buku', 'pengguna');
         
   
        if ($request->filled('dari') && $request->filled('sampai')) {
            $request->validate([
                'dari' => 'required|date',
                'sampai' => 'required|date',
            ]);
    
            $query->whereBetween('tgl_beli', [$request->dari, $request->sampai]);
        }
        session(['transaksiFilter' => $query->get()]);
        $transaksi = $query->latest()->paginate(7);
    
        // Total pendapatan juga ikut query (sudah terfilter kalau ada)
        $total_pendapatan = $query->sum('total_harga');
    
        return view('kasir.riwayat', compact('transaksi', 'total_pendapatan'));
    }
}
