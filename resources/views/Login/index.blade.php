<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Glass Style</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F5EEDD;
            background-size: cover;
            min-height: 100vh;
        }

        .glass-card {
            background: rgba(37, 37, 37, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: rgb(16, 16, 16);
        }

        .form-control::placeholder {
            color: #3a3939;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            color: #3a3939;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.3);
            color: #3a3939;
            border-color: rgba(255, 255, 255, 0.5);
        }

        .btn-lightglass {
            background-color: rgba(255, 255, 255, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #767575;
            transition: all 0.3s ease;
        }

        .btn-lightglass:hover {
            background-color: rgba(255, 255, 255, 0.4);
            color: black;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-md-4">
            <div class="glass-card text-center">
                <h2 class="mb-4">Login</h2>
                <form action="{{ route('login.auth')}}" method="POST">
                    @csrf
                    <div class="mb-3 text-start">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-lightglass">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
