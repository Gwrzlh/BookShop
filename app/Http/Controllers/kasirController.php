<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\detailTransaksi;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Sleep;



class kasirController extends Controller
{
    public function index()
    {
        $transaksi=transaksi::with('detailTransaksi.buku', 'pengguna')->orderBy('id_transaksi', 'desc')->get();
        $buku = buku::all();
        return view('kasir.index', compact('buku','transaksi'));
    }
    public function tambahKeKeranjang($id_buku)
    {
        $buku = buku::findOrFail($id_buku);
        $keranjang = session()->get('keranjang', []);

        // Cek apakah buku sudah ada di keranjang
        if (isset($keranjang[$id_buku])) {
            $keranjang[$id_buku]['jumlah'] += 1;
        } else {
            $keranjang[$id_buku] = [
                'id_buku' => $buku->id_buku,
                'judul' => $buku->judul,
                'harga' => $buku->harga,
                'jumlah' => 1,
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


}
