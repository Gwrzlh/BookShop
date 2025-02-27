<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <div>
            <div>
                <h1>Tambah Buku</h1>
                <form action="{{ route('pengguna.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="masukkan Username" required>
                    </div>
                    <div>
                        <label for="namaLengkap">Nama Lengkap</label>
                        <input type="text" name="namaLengkap" placeholder="Masukkan nama Lengkap anda" required>
                    </div>
                    <div>
                        <label for="role">Role:</label>
                        <select name="role" id="role" required>
                            <option value="Admin">Admin</option>
                            <option value="Owner">Owner</option>
                            <option value="Kasir">Kasir</option>
                        </select>
                    </div>
                    <div>
                        <label for="password">Passowrd</label>
                        <input type="password" name="password" placeholder="Min 7 karakter" required>
                    </div>
                    <div>
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi passoword diatas" required>
                    </div>
                    <div>
                        <input type="submit" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>