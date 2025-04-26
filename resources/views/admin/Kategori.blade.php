@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <div class="flex justify-between items-center px-4 py-2 border-b">
            <h2 class="text-xl font-semibold text-gray-700">Daftar Kategori</h2>
            <a href="{{ route('kategori.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm">
                + Tambah Kategori
            </a>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase text-center">
                <tr>
                    <th class="px-6 py-3">No.</th>
                    <th class="px-6 py-3">Nama Kategori</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-center text-sm">
                @foreach ($kategori as $kate)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-3">{{ $loop->iteration }}</td>
                    <td class="px-6 py-3">{{ $kate->nama_Kategori }}</td>
                    <td class="px-6 py-3 space-x-2">
                        <a href="{{ route('kategori.edit', $kate->id) }}" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">
                            Edit
                        </a>
                        <form action="{{ route('kategori.destroy', $kate->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection