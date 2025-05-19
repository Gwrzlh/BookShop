<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex min-h-screen bg-gray-100 font-sans">

    <!-- Sidebar -->
    <aside class="w-64 bg-indigo-600 text-white flex flex-col">
        <!-- Logo -->
        <div class="flex items-center justify-center h-20 border-indigo-500">
           <h1 class="font-bold">DapBookShop</h1>
        </div>

        <!-- Menu -->
        <nav class="flex-1 px-4 py-6 space-y-4">
            <a href="{{ route('admin.buku') }}" class="flex items-center px-3 py-2 rounded-lg hover:bg-indigo-700 transition">
                <span class="material-icons mr-3">menu_book</span> Data Buku
            </a>
            <a href="{{ route('admin.pengguna') }}" class="flex items-center px-3 py-2 rounded-lg hover:bg-indigo-700 transition">
                <span class="material-icons mr-3">groups</span> Data Pengguna
            </a>
            <a href="{{ route('admin.kategori') }}" class="flex items-center px-3 py-2 rounded-lg hover:bg-indigo-700 transition">
                <span class="material-icons mr-3">category</span> Data Kategori
            </a>
            <a href="{{ route('admin.transaksi') }}" class="flex items-center px-3 py-2 rounded-lg hover:bg-indigo-700 transition">
                <span class="material-icons mr-3">receipt_long</span> Transaksi
            </a>
        </nav>

        <!-- Optional Section "Your Teams" -->

    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar/Header -->
        <header class="bg-white shadow-md p-4 flex justify-between items-center">
            <span class="text-lg font-semibold text-indigo-700">
                WELCOME TO ADMIN DASHBOARD
            </span>
            <a href="{{ route('logout') }}" class="bg-rose-600 hover:bg-rose-500 text-white px-4 py-2 rounded-lg transition">
                Logout
            </a>
        </header>

        <!-- Content Section -->
        <main class="flex-1 p-6 bg-gray-100">
            @yield('content')
        </main>
    </div>

    <!-- Tambahkan Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</body>
</html>
