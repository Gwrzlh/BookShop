@extends('layouts.owner')

@section('content')
<div class="bg-white p-6 rounded-lg shadow mt-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Daftar Pengguna</h2>
            <p class="text-sm text-gray-500">Semua akun pengguna terdaftar.</p>
        </div>
       
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50 text-gray-700 text-left">
                <tr>
                    <th class="px-6 py-3 font-semibold">No.</th>
                    <th class="px-6 py-3 font-semibold">Username</th>
                    <th class="px-6 py-3 font-semibold">Nama Lengkap</th>
                    <th class="px-6 py-3 font-semibold">Password</th>
                    <th class="px-6 py-3 font-semibold">Role</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($penggunas as $pengguna)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $pengguna->username }}</td>
                    <td class="px-6 py-4">{{ $pengguna->nama_lengkap }}</td>
                    <td class="px-6 py-4">******</td> <!-- Password disembunyikan -->
                    <td class="px-6 py-4">{{ $pengguna->role }}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection