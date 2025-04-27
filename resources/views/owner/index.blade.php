@extends('layouts.owner')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <h2 class="text-3xl font-semibold text-indigo-800 mb-6">Dashboard Owner</h2>

    <!-- Card Summary -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="bg-white p-4 rounded-lg shadow">
        <h3 class="text-gray-600">Total Buku</h3>
        <p class="text-2xl font-bold text-indigo-700">{{ $totalBuku }}</p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow">
        <h3 class="text-gray-600">Total Transaksi Hari ini</h3>
        <p class="text-2xl font-bold text-indigo-700">{{ $totalTransaksiToday }}</p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow">
        <h3 class="text-gray-600">pendapatan Hari ini</h3>
        <p class="text-2xl font-bold text-indigo-700">{{ number_format($pendapatanToday) }}</p>
      </div>
      
    </div>

@endsection