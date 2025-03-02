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
            <h1>Login</h1>
        </div>
        <form action="{{ route('login.auth')}}" method="POST">
            @csrf
            <div>
                <label for="username">Username :</label>
                <input type="text" name="username" placeholder="Masukkan Username" required>
            </div>
            <div>
                <label for="password">Password :</label>
                <input type="password" name="password" placeholder="Masukkan Password" required>
            </div>
            <div>
                <input type="submit" name="submit">
            </div>            
        </form>
    </div>
</body>
</html>