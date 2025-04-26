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
                <h1>Tambah Kategori</h1>
                <form action="{{ route('kategori.store' $kategori->id) }}" method="post">
                    @csrf
                    <div>
                        <label for="username">Jenis Kategori Buku</label>
                        <input type="text" name="nama_kategori" placeholder="masukkan kategori" value="{{ $kategori->nama_kategori }}" required>
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