<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h2>hallo owner {{ session('namaLengkap') }}</h2>
   <div>
    <a href="{{ route('logout') }}">Logout</a>
   </div>
   
   <div>
    <div>
        @include('buku.index', ['bukus'=> \App\Models\buku::all()])
    </div>
    <div>
        @include('pengguna.index',['penggunas'=> \App\Models\pengguna::all()])
    </div>
    <div>
        @include('kasir.index', ['transaksi'=> \App\Models\transaksi::all()])
    </div>
   </div>
</body>
</html>