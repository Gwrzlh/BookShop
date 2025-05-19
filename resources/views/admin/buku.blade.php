@extends('layouts.admin')


@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Daftar Buku</h2>
            <p class="text-sm text-gray-500">Semua daftar buku yang tersedia.</p>
        </div>
        <a href="{{ route('buku.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
            + Tambah Buku
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50 text-gray-700 text-left">
                <tr>
                    <th class="px-6 py-3 font-semibold">No.</th>
                    <th class="px-6 py-3 font-semibold">Cover</th>
                    <th class="px-6 py-3 font-semibold">Judul</th>
                    <th class="px-6 py-3 font-semibold">Kategori</th>
                    <th class="px-6 py-3 font-semibold">Penerbit</th>
                    <th class="px-6 py-3 font-semibold">Pengarang</th>
                    <th class="px-6 py-3 font-semibold">Tahun Terbit</th>
                    <th class="px-6 py-3 font-semibold">Harga</th>
                    <th class="px-6 py-3 font-semibold">Stock</th>
                    <th class="px-6 py-3 font-semibold">Aksi</th>
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
                    <td class="'px-6 py-4">{{ $buku->kategori->nama_Kategori }}</td>
                    <td class="px-6 py-4">{{ $buku->penerbit }}</td>
                    <td class="px-6 py-4">{{ $buku->pengarang }}</td>
                    <td class="px-6 py-4">{{ $buku->tahun }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($buku->harga) }}</td>
                    <td class="px-6 py-4">{{ $buku->stock }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('buku.edit', $buku->id_buku) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">Edit</a>
                        <p class="text-gray-400">|</p>
                        <form action="{{ route('buku.destroy', $buku->id_buku) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

