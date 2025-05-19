@extends('layouts.admin')


@section('content')
<div class="container mx-auto mt-8 px-4">
    <div class="bg-white p-4 rounded-lg shadow">
        <h3 class="text-gray-600">Selamat Bekerja!</h3>
        <p class="text-2xl font-bold text-indigo-700">{{ session('namaLengkap')}}</p>
      </div>
</div>
@endsection