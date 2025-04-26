<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>

<body class="flex min-h-screen bg-gray-100 font-display">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-7    00 text-white flex flex-col">
        <div class="p-6 text-xl font-bold font-display border-b border-gray-700">Admin Panel</div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('admin.buku') }}" class="block py-2 px-4 rounded hover:bg-gray-700">📚 Data Buku</a>
            <a href="{{ route('admin.pengguna') }}" class="block py-2 px-4 rounded hover:bg-gray-700">👥 Data Pengguna</a>
            <a href="{{ route('admin.kategori') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Data Kategori</a> 
            <a href="{{ route('admin.transaksi') }}" class="block py-2 px-4 rounded hover:bg-gray-700">🧾 Transaksi</a>
        </nav>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <span class="text-lg font-display font-semibold">Selamat Datang, {{ session('namaLengkap') }}</span>
            <a href="{{ route('logout') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
        </header>

        <!-- Content Section -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
