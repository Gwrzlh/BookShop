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
                <h1>Tambah buku</h1>
            </div>
            <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div>
                <label for="judul">Judul :</label>
                <input type="text" name="judul" placeholder="Masukkan Judul Buku" required>
            </div>
            <div>
                <label for="penerbit">Penerbit :</label>
                <input type="text" name="penerbit" placeholder="Masukkan Penerbit Buku" required>
            </div>
           <div>
            <label for="tahun">Tahun Terbit :</label>
            <input type="text" name="tahun" placeholder="Masukkan Tahun Terbit Buku" required>
           </div>
           <div>
            <label for="pengarang">Pengarang :</label>
            <input type="text" name="pengarang" placeholder="Masukkan Pengarang Buku" required>
           </div>
           <div>
            <label for="cover">Cover:</label>
            <input type="file" name="cover" placeholder="Masukkan Cover Buku" required>
           </div>
           <div>
            <label for="harga">Harga :</label>
            <input type="text" name="harga" placeholder="Masukkan Harga Buku" required>
           </div>
           <div>
            <label for="stock">Stock :</label>
            <input type="number" name="stock" placeholder="Masukkan Stock Buku" required>
           </div>
           <div>
            <input type="submit" name="submit">
           </div>
            </form>

        </div>
    </div>
</body>
</html>