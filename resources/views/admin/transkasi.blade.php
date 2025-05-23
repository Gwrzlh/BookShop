@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <div class="bg-white p-4 rounded-lg shadow">
        <h3 class="text-gray-600">Total pendapatan</h3>
        <p class="text-2xl font-bold text-indigo-700">Rp.{{ number_format($total_pendapatan) }}</p>
      </div>
</div>
<div>
    {{-- <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-blue-600">Riwayat Transaksi Kasir</h1>
    </div> --}}

    <div class="bg-white p-6 rounded-lg shadow mt-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Daftar Transaksi</h2>
                <p class="text-sm text-gray-500">Semua transaksi penjualan tercatat di sini.</p>
            </div>
            {{-- <a href="{{ route('transaksi.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                + Tambah Transaksi
            </a> --}}
        </div>
    
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50 text-gray-700 text-left">
                    <tr>
                        <th class="px-6 py-3 font-semibold text-center">No.</th>
                        <th class="px-6 py-3 font-semibold">Judul Buku</th>
                        <th class="px-6 py-3 font-semibold">Nama Kasir</th>
                        <th class="px-6 py-3 font-semibold">Pembeli</th>
                        <th class="px-6 py-3 font-semibold">Tanggal Transaksi</th>
                        <th class="px-6 py-3 font-semibold">Tunai</th>
                        <th class="px-6 py-3 font-semibold">Total Transaksi</th>
                        <th class="px-6 py-3 font-semibold">Kembalian</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($transaksi as $trans)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-center">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($trans->detailTransaksi as $detail)
                                    <li>{{ $detail->buku->judul }} x {{ $detail->jumlah }} = Rp{{ number_format($detail->buku->harga) }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="px-6 py-4">{{ $trans->pengguna->nama_lengkap }}</td>
                        <td class="px-6 py-4">{{ $trans->nama_pembeli }}</td>
                        <td class="px-6 py-4">{{ $trans->tgl_beli }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($trans->bayar) }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($trans->total_harga) }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($trans->kembalian) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

@endsection