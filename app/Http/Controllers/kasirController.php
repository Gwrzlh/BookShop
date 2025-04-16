<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\transaksi;
use Illuminate\Http\Request;

// use function Symfony\Component\String\b;

class kasirController extends Controller
{
    public function index()
    {
        $buku = buku::all();
        return view('kasir.index', compact('buku'));
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

        return redirect()->route('kasir.index')->with('success', 'Buku ditambahkan ke transaksi!');
    }
    public function hapusDariKeranjang($id_buku)
    {
        $keranjang = session()->get('keranjang', []);
        if (isset($keranjang[$id_buku])) {
            unset($keranjang[$id_buku]);
            session()->put('keranjang', $keranjang);
        }

        return redirect()->route('kasir.index')->with('success', 'Buku dihapus dari transaksi!');
    }
    public function store(Request $request)
    {
        $keranjang = session()->get('keranjang', []);
        if (empty($keranjang)) {
            return redirect()->route('kasir.index')->with('error', 'Tidak ada buku yang ditambahkan!');
        }

        $request->validate([
            'id_pengguna' => 'required',
            'nama_pembeli' => 'required|string|max:255',
            'bayar' => 'required|numeric|min:0',
        ]);

        // Hitung total harga
        $totalHarga = array_sum(array_map(fn($item) => $item['harga'] * $item['jumlah'], $keranjang));

        // Hitung kembalian
        $kembalian = $request->bayar - $totalHarga;
        $idBuku = array_keys($keranjang)[0];

        // Simpan transaksi
        $transaksi = transaksi::create([
            'id_pengguna' => $request->id_pengguna,
            'id_buku' => $idBuku,
            'nama_pembeli' => $request->nama_pembeli,
            'tgl_beli' => now(),
            'bayar' => $request->bayar,
            'kembalian' => $kembalian,
            'total_harga' => $totalHarga,
        ]);

        // Simpan detail transaksi
        // foreach ($keranjang as $item) {
        //     DetailTransaksi::create([
        //         'id_transaksi' => $transaksi->id_transaksi,
        //         'id_buku' => $item['id_buku'],
        //         'jumlah' => $item['jumlah'],
        //         'subtotal' => $item['harga'] * $item['jumlah'],
        //     ]);
        // }

        // Hapus keranjang setelah transaksi selesai
        session()->forget('keranjang');

        return redirect()->route('kasir.index')->with('success', 'Transaksi berhasil disimpan!');
    }

}
