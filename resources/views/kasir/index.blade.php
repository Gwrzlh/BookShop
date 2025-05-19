@extends('layouts.kasir')

@section('content')

<!-- ... bagian <head> tetap sama seperti milikmu ... -->

    <body class="bg-gradient-to-r from-gray-100 to-gray-200 font-sans">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Kolom Kiri: Daftar Buku dan Filter -->
            <div class="flex-1">
                <!-- Filter Kategori -->
                <div class="flex flex-wrap gap-2 mb-6">
                    <a href="{{ route('kasir', ['kategori' => 'all']) }}" class="px-4 py-2 bg-indigo-100 text-indigo-700 border border-indigo-300 rounded-full hover:bg-indigo-600 hover:text-white transition-all" > All</a>
                    @foreach ($kategori as $kate)
                        <form action="{{ route('kasir') }}" method="GET">
                            <input type="hidden" name="kategori" value="{{ $kate->id }}">
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-100 text-indigo-700 border border-indigo-300 rounded-full hover:bg-indigo-600 hover:text-white transition-all">
                                {{ $kate->nama_Kategori }}
                            </button>
                        </form>
                    @endforeach
                </div>

                         @if(session('error'))
                      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
                              {{ session('error') }}
                      </div>
                           @endif
        
                <!-- Daftar Buku -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                    @foreach ($buku as $item)
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <img src="{{ asset('storage/cover/'.$item->cover) }}" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h4 class="font-bold text-gray-800 text-sm truncate">{{ $item->judul }}</h4>
                            <p class="text-xs text-gray-500">{{ $item->kategori->nama_Kategori }}</p>
                            <p class="text-s text-gray-500">{{ $item->stock }}</p>
                            <p class="mt-1 text-indigo-600 font-semibold text-sm">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                            <form action="{{ route('tambahkeranjang', $item->id_buku) }}" method="POST" class="mt-2">
                                @csrf
                                <button class="w-full bg-indigo-500 text-white py-2 text-sm rounded-lg hover:bg-indigo-600">
                                    Tambah
                                </button>
                            </form>
                           
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        
            <!-- Kolom Kanan: Panel Checkout -->
            <div class="w-full lg:w-1/3 bg-white shadow-lg rounded-xl p-6 sticky top-6 h-fit">
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Checkout</h3>
        
                @if(session('keranjang'))
                <table class="w-full text-sm mb-4">
                    @foreach (session('keranjang') as $item)
                    <tr class="border-b">
                        <td class="py-2">{{ $item['judul'] }}</td>
                        <td class="py-2">{{ $item['jumlah'] }}x</td>
                        <td class="py-2">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                        {{-- <td>{{ number_format($item['jumlahSeluruh']) }}</td> --}}
                        <td class="py-2">
                                Total: Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}
                            
                        </td>
                        <td class="py-2">
                            <form action="{{ route('hapuskeranjang', $item['id_buku']) }}" method="POST">
                                @csrf
                                <button class="text-red-600 hover:underline text-xs">Hapus</button>
                            </form>
                        </td>
                        @endforeach 
                        <div>
                           Rp.{{ number_format(array_sum(array_map(function($item){
                            return $item['harga'] * $item['jumlah'];
                        }, session('keranjang'))), 0, ',', '.') }}
                        </div>

                       
                    </tr>
                </table>
        
                <form action="{{ route('kasir.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_pengguna" value="{{ session('logged_user') }}">
        
                    <div class="mb-2">
                        <label class="block text-gray-600 text-sm mb-1">Nama Pembeli</label>
                        <input type="text" name="nama_pembeli" class="w-full border px-3 py-2 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm mb-1">Bayar</label>
                        <input type="number" name="bayar" class="w-full border px-3 py-2 rounded-md" required>
                    </div>
        
                  
        
                    <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg text-base hover:bg-indigo-700 transition">
                        Bayar
                    </button>
                </form>
                @else
                    <p class="text-gray-500">Keranjang masih kosong.</p>
                @endif
            </div>
        </div>
    
        @if(session('id_transaksi'))
        <script>
            window.onload = function () {
                const link = document.createElement('a');
                link.href = "{{ route('GenerateStruk', session('id_transaksi')) }}";
                link.setAttribute('download', 'struk.pdf');
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
    
                fetch("{{ route('ClearIdTransaksi') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
            };
        </script>
        @endif
    </body>
        
@endsection