<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
</head>
<body>
    <h1>Daftar Produk</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
        </tr>
        @foreach ($pengguna as $pengg )
        
        <tr>
            <td>{{$pengg->id_pengguna }}</td>
            <td>{{$pengg->nama_lengkap }}</td>
            <td>{{$pengg->password }}</td>  
           
        </tr>
        @endforeach
  
    </table>
</body>
</html>
