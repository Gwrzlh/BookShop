@extends('layouts.owner')

@section('content')
<div class="py-10">
    {{-- <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-blue-600">Riwayat Transaksi Kasir</h1>
    </div> --}}

    <div class="bg-white p-6 rounded-lg shadow mt-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Daftar Transaksi</h2>
                <p class="text-sm text-gray-500">Semua transaksi penjualan tercatat di sini.</p>
            </div>
            <form action="{{ route('owner.transaksi') }}" method="GET" class="flex items-center space-x-4">
                <div class="flex items-center space-x-10 mb-4">
                    <p>Cari Data sesuai tanggal:</p>
                    <div>
                        <label for="dari">Dari tanggal</label>
                        <input type="date" name="dari">
                    </div>
               <div>
                <label for="sampai">Sampai Tanggal</label>
                <input type="date" name="sampai">
               </div>
               <div>
                <button type="submit"
                        class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline focus:ring-2 focus:ring-indigo-500">
                        Filter
                    </button>
               </div>
            </div>
               
            </form>
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
            <div class="flex justify-between m-5">
                <div>
                    <button type="submit" class="inline-flex justify-center rounded-md bg-red-500 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-red-600 focus:outline focus:ring-2 focus:ring-indigo-500">
                        <a href="{{ route('owner.Pdftransaksi') }}">Download PDF</a></button>
                </div>
                <p class="font-semibold">Total Transaksi: Rp{{number_format($total_pendapatan)}}</p>
            </div>
        </div>
    </div>
@endsection