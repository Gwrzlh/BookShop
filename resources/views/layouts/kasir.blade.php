<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kasir Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-indigo-600 px-4 py-3 flex justify-between items-center shadow-md">
        <!-- Kiri: Hamburger + Logo -->
        <div class="flex items-center space-x-3">
            <!-- Icon menu (hamburger) -->
           
            <!-- Logo / Judul -->
            <span class="text-white font-semibold text-lg">Kasir Dashboard</span>
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('riwayat') }}" >Riwayat Transaksi</a>
            <span class="text-white font-medium">{{ session('namaLengkap') }}</span>
            <a href="{{ route('logout') }}" class="bg-rose-600 hover:bg-rose-500 text-white px-4 py-1 rounded-lg transition">Logout</a>
        </div>
    </nav>
    <main class="flex-1 p-6 bg-gray-100">
        @yield('content')
    </main>
    <!-- Bagian kategori (tombol) -->


</body>
</html>
