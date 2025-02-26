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
        <h1>Admin</h1>
    </div>
    <div>
        <a href="#">User</a>
    </div>

    <div>
        <div>
            <a href="#">Tambah buku</a>
        </div>
        <table border="1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Cover</th>
                    <th>Judul</th>
                    <th>penerbit</th>
                    <th>pengarang</th>
                    <th>Tahun Terbit</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            
                <tr>
                    @foreach ( $bukus as $buku )
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                      <img src="{{ asset('/storage/buku' . $buku->cover) }}" alt="cover buku">
                    </td>   
                    <td>
                        {{ $buku->judul }}    
                    </td>  
                    <td>
                        {{ $buku->penerbit }}
                    </td>
                    <td>
                        {{ $buku->pengarang }}
                    </td>
                    <td>
                        {{ $buku->tahun }}
                    </td>
                    <td>
                        {{ $buku->harga }}
                    </td>
                    <td>
                        {{ $buku->stock }}
                    </td>
                    @endforeach       
                </tr>
        </table>
    </div>
</body>
</html>