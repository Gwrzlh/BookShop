<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Kategori</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-8">

    <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-lg">
        <div class="border-b border-gray-300 pb-12">
            <h1 class="text-2xl font-semibold text-gray-900 mb-8">Tambah Kategori</h1>

            <form action="{{ route('kategori.store') }}" method="post" class="space-y-8">
                @csrf

                <!-- Jenis Kategori Buku -->
                <div>
                    <label for="nama_kategori" class="block text-sm font-medium text-gray-700">Jenis Kategori Buku</label>
                    <div class="mt-2">
                        <input type="text" name="nama_kategori" id="nama_kategori" placeholder="Masukkan kategori"
                            class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline focus:ring-2 focus:ring-indigo-500">
                        Submit
                    </button>
                    <button type="submit"
                    class="inline-flex justify-center rounded-md bg-red-500 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-red-600 focus:outline focus:ring-2 focus:ring-indigo-500">
                    <a href="{{ route('admin.kategori') }}">Beck</a>
                </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
