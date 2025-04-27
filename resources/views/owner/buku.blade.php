@extends('layouts.owner')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Daftar Buku</h2>
            <p class="text-sm text-gray-500">Semua daftar buku yang tersedia.</p>
        </div>

    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50 text-gray-700 text-left">
                <tr>
                    <th class="px-6 py-3 font-semibold">No.</th>
                    <th class="px-6 py-3 font-semibold">Cover</th>
                    <th class="px-6 py-3 font-semibold">Judul</th>
                    <th class="px-6 py-3 font-semibold">Penerbit</th>
                    <th class="px-6 py-3 font-semibold">Pengarang</th>
                    <th class="px-6 py-3 font-semibold">Tahun Terbit</th>
                    <th class="px-6 py-3 font-semibold">Harga</th>
                    <th class="px-6 py-3 font-semibold">Stock</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($bukus as $buku)
                <tr>
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">
                        <img src="{{ asset('storage/cover/' . $buku->cover) }}" alt="cover buku" class="w-16 h-20 object-cover rounded shadow border">
                    </td>
                    <td class="px-6 py-4">{{ $buku->judul }}</td>
                    <td class="px-6 py-4">{{ $buku->penerbit }}</td>
                    <td class="px-6 py-4">{{ $buku->pengarang }}</td>
                    <td class="px-6 py-4">{{ $buku->tahun }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($buku->harga) }}</td>
                    <td class="px-6 py-4">{{ $buku->stock }}</td>
                  
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection