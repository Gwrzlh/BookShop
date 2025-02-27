<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pengguna</title>
</head>
<body>

    <div>
        <div>
            <a href="{{ route('pengguna.create') }}">Tambah Pengguna</a>
        </div>
        <div>
            <table border="1">
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
                        <td>******</td> <!-- Menyembunyikan password -->
                        <td>{{ $pengguna->role }}</td> 
                        <td>
                            <a href="{{ route('pengguna.edit', $pengguna->id_pengguna) }}">Edit</a>
                            
                            <!-- Form untuk Hapus Data -->
                            <form action="{{ route('pengguna.destroy', $pengguna->id_pengguna) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
