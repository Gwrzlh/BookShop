<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Kasir - Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .kasir-header {
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .kasir-header h2 {
            font-weight: 700;
            color: #343a40;
        }

        .btn-outline-danger {
            border-radius: 30px;
        }

        .card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .btn-primary {
            border-radius: 30px;
        }

        .table thead {
            background-color: #343a40;
            color: #fff;
        }

        .form-control {
            border-radius: 12px;
            box-shadow: none !important;
        }

        .btn-success {
            border-radius: 30px;
            font-weight: bold;
        }

        .alert {
            border-radius: 16px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .section-title {
            margin-top: 40px;
            margin-bottom: 20px;
            font-size: 1.4rem;
            font-weight: 600;
            color: #495057;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center kasir-header">
            <h2>🧾 Transaksi Baru - Halaman Kasir</h2>
            <a href="{{ route('logout') }}" class="btn btn-outline-danger">Logout</a>
        </div>

        <div class="section-title">📚 Daftar Buku</div>
        <div class="row">
            @foreach ($buku as $item)
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="{{ asset('storage/cover/'.$item->cover) }}" class="card-img-top" alt="{{ $item->judul }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <h2 class="card-title">{{ $item->kategori->nama_kategori }}</h2>
                        <p class="text-muted">Harga: <strong>Rp {{ number_format($item->harga, 0, ',', '.') }}</strong></p>
                        <form action="{{ route('tambahkeranjang', $item->id_buku) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">+ Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="section-title">🛒 Daftar Buku yang Dibeli</div>
        @if (session()->has('keranjang') && count(session('keranjang')) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover mt-3">
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
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <form action="{{ route('kasir.store') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="id_pengguna" value="{{ session('logged_user') }}">

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nama_pembeli" class="form-label">🧑 Nama Pembeli:</label>
                    <input type="text" name="nama_pembeli" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="bayar" class="form-label">💵 Bayar:</label>
                    <input type="number" name="bayar" class="form-control" required>
                </div>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-success btn-lg">✅ Proses Transaksi</button>
            </div>
        </form>

        @else
        <div class="alert alert-warning mt-3">
            ⚠️ Tidak ada buku yang ditambahkan ke transaksi.
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
</html>
