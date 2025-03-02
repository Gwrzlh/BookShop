<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Buku</title>
</head>
<body>
    <div>
        <div>
            <div>
                <h1>Edit Buku</h1>
            </div>
            <form action="{{ route('buku.update', $buku->id_buku) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="judul">Judul :</label>
                    <input type="text" name="judul" value="{{ $buku->judul }}" required>
                </div>
                <div>
                    <label for="penerbit">Penerbit :</label>
                    <input type="text" name="penerbit" value="{{ $buku->penerbit }}" required>
                </div>
                <div>
                    <label for="tahun">Tahun Terbit :</label>
                    <input type="text" name="tahun" value="{{ $buku->tahun }}" required>
                </div>
                <div>
                    <label for="pengarang">Pengarang :</label>
                    <input type="text" name="pengarang" value="{{ $buku->pengarang }}" required>
                </div>
                <div>
                    <label for="cover">Cover:</label>
                    <input type="file" name="cover">
                    <p>Cover saat ini:</p>
                    <img src="{{ asset('storage/cover/' . $buku->cover) }}" width="100" alt="Cover Buku">
                </div>
                <div>
                    <label for="harga">Harga :</label>
                    <input type="text" name="harga" value="{{ $buku->harga }}" required>
                </div>
                <div>
                    <label for="stock">Stock :</label>
                    <input type="number" name="stock" value="{{ $buku->stock }}" required>
                </div>
                <div>
                    <input type="submit" value="Update Buku">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
