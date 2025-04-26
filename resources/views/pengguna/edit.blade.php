<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Pengguna</title>
</head>
<body>
    <div>
        <h1>Edit Pengguna</h1>
        <form action="{{ route('pengguna.update', $penggunas->id_pengguna) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="username">Username</label>
                <input type="text" name="username" value="{{ $penggunas->username }}" required>
            </div>

            <div>
                <label for="namaLengkap">Nama Lengkap</label>
                <input type="text" name="namaLengkap" value="{{ $penggunas->nama_lengkap }}" required>
            </div>

            <div>
                <label for="role">Role:</label>
                <select name="role" id="role" required>
                    <option value="Admin" {{ $penggunas->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Owner" {{ $penggunas->role == 'Owner' ? 'selected' : '' }}>Owner</option>
                    <option value="Kasir" {{ $penggunas->role == 'Kasir' ? 'selected' : '' }}>Kasir</option>
                </select>
            </div>

            <div>
                <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" placeholder="Min 7 karakter">
            </div>

            <div>
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Konfirmasi password">
            </div>

            <div>
                <input type="submit" value="Simpan Perubahan">
                <a href="{{ route('admin') }}">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
