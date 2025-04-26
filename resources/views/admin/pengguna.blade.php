@extends('layouts.admin')

@section('content')
<div class="mt-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="flex items-center justify-between bg-green-600 text-white px-6 py-4">
            <h4 class="text-lg font-semibold">Daftar Pengguna</h4>
            <a href="{{ route('pengguna.create') }}" class="bg-white text-green-600 hover:bg-green-100 font-semibold py-2 px-4 rounded shadow-sm transition">
                Tambah Pengguna
            </a>
        </div>
        <div class="p-6 overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 text-center">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No.</th>
                        <th class="px-4 py-2 border-b">Username</th>
                        <th class="px-4 py-2 border-b">Nama Lengkap</th>
                        <th class="px-4 py-2 border-b">Password</th>
                        <th class="px-4 py-2 border-b">Role</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penggunas as $pengguna)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $pengguna->username }}</td>
                            <td class="px-4 py-2">{{ $pengguna->nama_lengkap }}</td>
                            <td class="px-4 py-2">******</td> <!-- Password disembunyikan -->
                            <td class="px-4 py-2">{{ $pengguna->role }}</td>
                            <td class="px-4 py-2 flex justify-center items-center gap-2">
                                <a href="{{ route('pengguna.edit', $pengguna->id_pengguna) }}" class="bg-yellow-400 text-white hover:bg-yellow-500 font-semibold py-1 px-3 rounded transition text-sm">
                                    Edit
                                </a>
                                <form action="{{ route('pengguna.destroy', $pengguna->id_pengguna) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white hover:bg-red-600 font-semibold py-1 px-3 rounded transition text-sm">
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