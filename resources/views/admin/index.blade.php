<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Toko Buku</a>
            <div class="ms-auto">
                <span class="text-white me-3">Selamat Datang, {{ session('namaLengkap') }}</span>
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Daftar Buku</h4>
                        <a href="{{ route('buku.create') }}" class="btn btn-secondary text-white" type="button">Tambah Buku</a>
                    </div>
                    <div class="card-body">
                        @include('buku.index', ['bukus'=> \App\Models\buku::all()]) 
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h4>Daftar Pengguna</h4>
                        <a href="{{ route('pengguna.create') }}" class="btn btn-secondary"> tambah pengguna</a>

                    </div>
                    <div class="card-body">
                        @include('pengguna.index', ['penggunas'=> \App\Models\pengguna::all()]) 
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-warning text-dark">
                        <h4>Daftar Transaksi</h4>
                    </div>
                    <div class="card-body">
                        @include('transaksi.index', ['transaksi'=> \App\Models\transaksi::all()])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>