<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>SELAMAT DATANG OWNER {{ session('namaLengkap') }}</h2>
       {{-- table buku --}}
    <h3>Data Buku</h3>
    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
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

    {{-- table pengguna --}}

    <h3>Data pengguna</h3>

    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
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
                        <td>******</td> <!-- Menyembunyikan password -->
                        <td>{{ $pengguna->role }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- data transaksi  --}}

    <h3>Table transaksi</h3>
    @include('transaksi.index', ['transaksi'=> \App\Models\transaksi::all()])
</body>
</html>