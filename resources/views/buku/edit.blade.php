<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #212529;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #212529;
        }

        .form-control::placeholder {
            color: #444;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            color: #212529;
        }

        .btn-glass {
            background-color: rgba(255, 255, 255, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #212529;
            transition: all 0.3s ease;
        }

        .btn-glass:hover {
            background-color: rgba(255, 255, 255, 0.4);
            color: black;
        }

        img.preview {
            margin-top: 10px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="glass-card">
        <h2 class="text-center mb-4">✏️ Edit Buku</h2>
        <form action="{{ route('buku.update', $buku->id_buku) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul :</label>
                <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}" required>
            </div>

            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit :</label>
                <input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" required>
            </div>

            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun Terbit :</label>
                <input type="text" name="tahun" class="form-control" value="{{ $buku->tahun }}" required>
            </div>

            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang :</label>
                <input type="text" name="pengarang" class="form-control" value="{{ $buku->pengarang }}" required>
            </div>

            <div class="mb-3">
                <label for="cover" class="form-label">Cover:</label>
                <input type="file" name="cover" class="form-control">
                <p class="mt-2">Cover saat ini:</p>
                <img src="{{ asset('storage/cover/' . $buku->cover) }}" width="100" alt="Cover Buku" class="preview">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga :</label>
                <input type="text" name="harga" class="form-control" value="{{ $buku->harga }}" required>
            </div>

            <div class="mb-4">
                <label for="stock" class="form-label">Stock :</label>
                <input type="number" name="stock" class="form-control" value="{{ $buku->stock }}" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-glass">💾 Update Buku</button>
                <a href="{{ route('admin') }}" >kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
