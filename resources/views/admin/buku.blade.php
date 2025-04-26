@extends('layouts.admin')


@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Daftar Buku</h2>
        <a href="{{ route('buku.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Tambah Buku</a>
    </div>

    <table class="min-w-full table-auto text-sm">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">No.</th>
                <th class="px-4 py-2">cover</th>
                <th class="px-4 py-2">Judul</th>
                <th class="px-4 py-2">Penerbit</th>
                <th class="px-4 py-2">Pengarang</th>
                <th class="px-4 py-2">Tahun terbit</th>
                <th class="px-4 py-2">Harga</th>
                <th class="px-4 py-2">Stock</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukus as $buku)
            
            <tr class="border-t">
                <td>{{ $loop->iteration }}</td>
                <td class="px-4 py-2">
                    <img src="{{ asset('storage/cover/' . $buku->cover) }}" alt="cover buku" class="w-16 h-20 object-cover rounded shadow-sm border border-gray-200" width="50">    
                </td>
                <td class="px-4 py-2">{{ $buku->judul }}</td>
                <td class="px-4 py-2">{{ $buku->penerbit }}</td>
                <td class="px-4 py-2">{{ $buku->pengarang }}</td>
                <td class="px-4 py-2">{{ $buku->tahun }}</td>
                <td class="px-4 py-2">Rp {{ number_format($buku->harga) }}</td>
                <td class="px-4 py-2">{{ $buku->stock }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('buku.edit', $buku->id_buku) }}" class="text-blue-500 hover:underline">Edit</a>
                    |
                    <form action="{{ route('buku.destroy', $buku->id_buku) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

