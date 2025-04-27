<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
 
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body>
    <nav class="bg-indigo-700">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
          <div class="text-white font-bold text-2xl">
            <a href="{{ route('owner') }}">Owner Panel</a>
          </div>
          <div class="space-x-6">
            <a href={{ route('owner.buku') }} class="text-white hover:text-gray-300">Buku</a>
            <a href={{ route('owner.pengguna') }} class="text-white hover:text-gray-300">pengguna</a>
            <a href={{ route('owner.kategori') }} class="text-white hover:text-gray-300">Kategori</a>
            <a href={{ route('owner.transaksi') }} class="text-white hover:text-gray-300">Transaksi</a>
            <a href="/logout" class="text-red-300 hover:text-white">Logout</a>
          </div>
        </div>
      </nav>

      <main class="flex-1 p-6">
        @yield('content')
    </main>
</body>
</html>