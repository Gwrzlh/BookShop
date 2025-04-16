<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2 class="mb-3">Halaman Kasir - Transaksi Baru</h2>
    <a href="{{ route('logout') }}">Logout</a>
        <!-- Menampilkan daftar buku dalam bentuk card -->
        <div class="row">
            @foreach ($buku as $item)
            <div class="col-md-3">
                <div class="card mb-3">
                    <img src="{{ asset('storage/cover/'.$item->cover) }}" class="card-img-top" alt="{{ $item->judul }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text">Harga: Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                        <form action="{{ route('tambahkeranjang', $item->id_buku) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    
        <h3 class="mt-4">Daftar Buku yang Dibeli</h3>
    
        @if (session()->has('keranjang') && count(session('keranjang')) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach (session('keranjang') as $item)
                <tr>
                    <td>{{ $item['judul'] }}</td>
                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td>{{ $item['jumlah'] }}</td>
                    <td>Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('hapuskeranjang', $item['id_buku']) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
        <form action="{{ route('kasir.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_pengguna" value="{{ session('logged_user') }}">
    
            <div class="form-group">
                <label for="nama_pembeli">Nama Pembeli:</label>
                <input type="text" name="nama_pembeli" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="bayar">Bayar:</label>
                <input type="number" name="bayar" class="form-control" required>
            </div>
    
            <button type="submit" class="btn btn-success">Proses Transaksi</button>
        </form>
    
        @else
        <p>Tidak ada buku yang ditambahkan ke transaksi.</p>
        @endif
    </div>
</body>
</html>