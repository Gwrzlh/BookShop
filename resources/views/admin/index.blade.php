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
            <h1>Admin!</h1>
        </div>
        <div>
            <div>
                <div>
                    <h4>Table buku</h4>
                </div>
                @include('buku.index', ['bukus'=> \App\Models\buku::all()]) 
            </div>
        </div>
        <div>
            <div>
                <div>
                    <h4>table pengguna</h4>
                </div>
                  <div>
                    @include('pengguna.index',['penggunas'=> \App\Models\pengguna::all()])
                  </div>
            </div>
        </div>
    </div>
    
</body>
</html>