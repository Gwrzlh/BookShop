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
        <div><h4>Selamat datang {{ $transaksi->pengguna->nama_lengkap }}</h4></div>
        <div>
            @foreach ($ as $item)
                
            <div>

            </div>
            @endforeach

        </div>
    </div>
</body>
</html>