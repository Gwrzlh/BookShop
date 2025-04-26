@extends('layouts.admin')

@section('content')
<div class="py-10">
    {{-- <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-blue-600">Riwayat Transaksi Kasir</h1>
    </div> --}}

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6 overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 text-center">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No.</th>
                        <th class="px-4 py-2 border-b">Judul Buku</th>
                        <th class="px-4 py-2 border-b">Nama Kasir</th>
                        <th class="px-4 py-2 border-b">Pembeli</th>
                        <th class="px-4 py-2 border-b">Tanggal Transaksi</th>
                        <th class="px-4 py-2 border-b">Tunai</th>
                        <th class="px-4 py-2 border-b">Total Transaksi</th>
                        <th class="px-4 py-2 border-b">Kembalian</th>
                        {{-- <th class="px-4 py-2 border-b">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $trans)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 text-left">
                                <ul class="list-disc list-inside">
                                    @foreach ($trans->detailTransaksi as $detail)
                                        <li>{{ $detail->buku->judul }} x {{ $detail->jumlah }} = Rp{{ number_format($detail->buku->harga) }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-4 py-2">{{ $trans->pengguna->nama_lengkap }}</td>
                            <td class="px-4 py-2">{{ $trans->nama_pembeli }}</td>
                            <td class="px-4 py-2">{{ $trans->tgl_beli }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($trans->bayar) }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($trans->total_harga) }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($trans->kembalian) }}</td>
                            {{-- 
                            <td class="px-4 py-2">
                                <form action="{{ route('transaksi.destroy', $trans->id_transaksi) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus transaksi ini?');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 text-sm transition">
                                        Hapus
                                    </button>
                                </form>
                            </td> 
                            --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection