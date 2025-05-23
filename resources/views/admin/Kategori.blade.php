@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Daftar Kategori</h2>
                <p class="text-sm text-gray-500">Semua kategori buku yang tersedia.</p>
            </div>
            <a href="{{ route('kategori.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                + Tambah Kategori
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50 text-gray-700 text-left">
                    <tr>
                        <th class="px-6 py-3 font-semibold text-center">No.</th>
                        <th class="px-6 py-3 font-semibold text-center">Nama Kategori</th>
                        <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-center">
                    @foreach ($kategori as $kate)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $kate->nama_Kategori }}</td>
                        <td class="px-6 py-4 flex justify-center space-x-2">
                            <a href="{{ route('kategori.edit', $kate->id) }}" class=" text-indigo-600 hover:text-indigo-900 text-sm font-medium">Edit</a>
                            <p class="text-gray-400">|</p>
                            <form action="{{ route('kategori.destroy', $kate->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">
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
</div>


@endsection