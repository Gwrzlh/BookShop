<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-success text-white d-flex justify-content-between">
                <h4>Daftar Pengguna</h4>
                <a href="{{ route('pengguna.create') }}" class="btn btn-light">Tambah Pengguna</a>
            </div>
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
                                <td>
                                    <a href="{{ route('pengguna.edit', $pengguna->id_pengguna) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('pengguna.destroy', $pengguna->id_pengguna) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');" class="d-inline">
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
