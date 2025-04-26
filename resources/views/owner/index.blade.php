<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Owner Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 30px;
        }

        .section-title {
            font-weight: 600;
            font-size: 1.6rem;
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 30px;
        }

        .table {
            border-radius: 12px;
            overflow: hidden;
            background-color: rgba(255, 255, 255, 0.4);
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table thead {
            background-color: rgba(33, 37, 41, 0.8);
            color: #fff;
        }

        .welcome {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: #212529;
        }

        img.img-thumbnail {
            background-color: rgba(255, 255, 255, 0.6);
            border: none;
        }
    </style>
</head>
<body>
    <div class="glass-card">
        <div class="welcome">👑 SELAMAT DATANG OWNER {{ session('namaLengkap') }}

            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
        </div>

        {{-- Table Buku --}}
        <div class="section-title">📚 Data Buku</div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Penerbit</th>
                        <th>Pengarang</th>
                        <th>Tahun Terbit</th>
                        <th>Harga</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bukus as $buku)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/cover/' . $buku->cover) }}" alt="cover buku" class="img-thumbnail" width="50">
                            </td>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->penerbit }}</td>
                            <td>{{ $buku->pengarang }}</td>
                            <td>{{ $buku->tahun }}</td>
                            <td>{{ $buku->harga }}</td>
                            <td>{{ $buku->stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Table Pengguna --}}
        <div class="section-title">🧑‍💼 Data Pengguna</div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penggunas as $pengguna)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengguna->username }}</td>
                            <td>{{ $pengguna->nama_lengkap }}</td>
                            <td>******</td>
                            <td>{{ $pengguna->role }}</td>
                            <td>-</td> <!-- Tambahkan tombol aksi kalau mau -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Table Transaksi --}}
        <div class="section-title">💳 Data Transaksi</div>
        <div class="glass-card">
            @include('transaksi.index', ['transaksi' => \App\Models\transaksi::all()])
        </div>
    </div>
</body>
</html>
