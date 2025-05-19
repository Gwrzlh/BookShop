<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\detailTransaksi;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Sleep;
use App\Models\kategori;



class kasirController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::all();

    // Filter buku berdasarkan kategori jika ada parameter
    $buku = Buku::query();
    if ($request->has('kategori') && $request->kategori !== 'all') {
        $buku->where('kategori_id', $request->kategori);
    }
    $buku = $buku->get();

    return view('kasir.index', [
        'kategori' => $kategori,
        'buku' => $buku,
    ]);
    }
    public function tambahKeKeranjang($id_buku)
    {
        $buku = buku::findOrFail($id_buku);
        $keranjang = session()->get('keranjang', []);


        if ($buku->stock < 1) {
          return redirect()->route('kasir')->with('error', 'Stock Habis!');
        }

       
        
        if (isset($keranjang[$id_buku])) {
            $keranjang[$id_buku]['jumlah'] += 1;
        } else {
            $keranjang[$id_buku] = [
                'id_buku' => $buku->id_buku,
                'judul' => $buku->judul,
                'harga' => $buku->harga,
                'jumlah' => 1,
                'jumlahSeluruh' => $buku->harga * 1,
            
            ];
        }

        session()->put('keranjang', $keranjang);

        return redirect()->route('kasir')->with('success', 'Buku ditambahkan ke transaksi!');
    }
    public function hapusDariKeranjang($id_buku)
    {
        $keranjang = session()->get('keranjang', []);
        if (isset($keranjang[$id_buku])) {
            unset($keranjang[$id_buku]);
            session()->put('keranjang', $keranjang);
        }

        return redirect()->route('kasir')->with('success', 'Buku dihapus dari transaksi!');
    }
    public function store(Request $request)
    {
        $keranjang = session()->get('keranjang', []);
        if (empty($keranjang)) {
            return redirect()->route('kasir')->with('error', 'Tidak ada buku yang ditambahkan!');
        }

        $request->validate([
            'id_pengguna' => 'required',
            'nama_pembeli' => 'required|string|max:255',
            'bayar' => 'required|numeric|min:0',
        ]);

         $bayar = str_replace(['.',',','Rp',''],'', $request->bayar);
        // Hitung total harga
        $totalHarga = array_sum(array_map(fn($item) => $item['harga'] * $item['jumlah'], $keranjang));

        // Hitung kembalian
        $kembalian = $bayar - $totalHarga;
        $idBuku = array_keys($keranjang)[0];

        // Simpan transaksi
        $transaksi = transaksi::create([
            'id_pengguna' => $request->id_pengguna,
            'id_buku' => $idBuku,
            'nama_pembeli' => $request->nama_pembeli,
            'tgl_beli' => now(),
            'bayar' => $bayar,
            'kembalian' => $kembalian,
            'total_harga' => $totalHarga,
        ]);
    
        $penguranganstock = buku::findOrFail($idBuku);
        $penguranganstock->stock -= $keranjang[$idBuku]['jumlah'];
        $penguranganstock->save();

        // $totalKeranjang = $totalHarga->count();


        // Simpan detail transaksi
        foreach ($keranjang as $item) {
            detailTransaksi::create([
                'id_transaksi' => $transaksi->id_transaksi,
                'id_buku' => $item['id_buku'],
                'jumlah' => $item['jumlah'],
                'subtotal' => $item['harga'] * $item['jumlah'],
            ]);
        }

        // Hapus keranjang setelah transaksi selesai
        session()->forget('keranjang');
        // return redirect()->route('kasir')->with('id_transaksi', $transaksi->id);

        return redirect()->route('kasir')->with('id_transaksi', $transaksi->id_transaksi);

        // return redirect()->route('kasir')->with('success', 'Transaksi berhasil disimpan!');
    }
    public function struk( Request $request, $id_transaksi)
    {
        $transaksi = transaksi::with('detailTransaksi.buku','pengguna')->findOrFail($id_transaksi);
        return view('kasir.generateStruk', compact('transaksi'));
        // return view()
        
    }
    public function kategoris()
    {
        $kategoris = kategori::all();
        return view('kasir.index', compact('kategoris'));
    }
    public function riwayat(request $request )
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
