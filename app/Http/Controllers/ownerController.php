<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\pengguna;
use App\Models\kategori;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ownerController extends Controller
{

   public function index()
   {
      $today = Carbon::now();

      $totalBuku = buku::count();
   

      $totalTransaksiToday = transaksi::whereDate('tgl_beli', $today)->count();

      $pendapatanToday = transaksi::whereDate('tgl_beli',$today)->sum('total_harga');

      return view('owner.index',
      [
         'totalBuku' =>$totalBuku,
         'totalTransaksiToday' => $totalTransaksiToday,
         'pendapatanToday' => $pendapatanToday,
      ]
      );

   }
   public function buku()
   {
      $bukus = buku::with('kategori')->latest()->paginate(7);;
      return view('owner.buku', compact('bukus'));
   }
   public function pengguna()
   {
      $penggunas = pengguna::all();
      return view('owner.pengguna', compact('penggunas'));
   }
  
   public function kategori()
   {
      $kategori = kategori::all();
      return view('owner.kategori', compact('kategori'));
   }
   public function transaksi(Request $request)
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
   
       return view('owner.transaksi', compact('transaksi', 'total_pendapatan'));
   }

   // public function Filter(Request $request)
   // {
   //     $request->validate([
   //       'dari'=>'required|date',
   //       'sampai'=>'required|date',
   //     ]);

   //     $dari = $request->dari;
   //     $sampai = $request->sampai;
   //     $transaksi = transaksi::whereBetween('tgl_beli', [$dari, $sampai])->with('detailTransaksi.buku', 'pengguna')->get();
   //   session(['transaksiFilter' => $transaksi]);

   //     return view('owner.transaksi',compact('transaksi'));
       
   // }
   public function generatePdf()
   {
      $transaksi = session('transaksiFilter');

      if(!$transaksi)
      {
         $transaksi = transaksi::with('detailTransaksi.buku', 'pengguna')->get();
      }

      $pdf = Pdf::loadView('transaksi.index', compact('transaksi'))->setPaper('A4','potrait');

      return $pdf->download('pendataan-Transaksi.pdf');

   }
}
