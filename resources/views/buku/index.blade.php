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
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Toko Buku</a>
            <div class="ms-auto">
                <span class="text-white me-3">Selamat Datang, {{ session('namaLengkap') }}</span>
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav> --}}

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header bg-primary text-white d-flex justify-content-between">
                       
                        <a href="{{ route('buku.create') }}" class="btn btn-light">Tambah Buku</a>
                    </div> --}}
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
                                    <th>Action</th>
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
                                        <td>
                                            <a href="{{ route('buku.edit', $buku->id_buku) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('buku.destroy', $buku->id_buku) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?');" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
