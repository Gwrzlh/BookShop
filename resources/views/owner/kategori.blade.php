@extends('layouts.owner')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Daftar Kategori</h2>
                <p class="text-sm text-gray-500">Semua kategori buku yang tersedia.</p>
            </div>
            
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50 text-gray-700 text-left">
                    <tr>
                        <th class="px-6 py-3 font-semibold text-center">No.</th>
                        <th class="px-6 py-3 font-semibold text-center">Nama Kategori</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-center">
                    @foreach ($kategori as $kate)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $kate->nama_Kategori }}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection