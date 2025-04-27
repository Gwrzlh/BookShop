<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tambah Buku</title>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-8">

    <div class="space-y-12 w-full max-w-4xl">
        <div class="border-b border-gray-300 pb-12">
            <div class="font-display text-2xl font-semibold leading-7 text-gray-900 mb-8">
                <h1>Tambah Buku</h1>
            </div>

            <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Judul -->
                    <div class="sm:col-span-2">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                        <div class="mt-2">
                            <input type="text" name="judul" id="judul" placeholder="Judul buku"
                                class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                    </div>

                    <!-- Kategori -->
                    <div class="sm:col-span-2">
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori Buku</label>
                        <div class="mt-2">
                            <select name="kategori" id="kategori"
                                class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                @foreach ($kategori as $kate)
                                    <option value="{{ $kate->id }}">{{ $kate->nama_Kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Penerbit -->
                    <div>
                        <label for="penerbit" class="block text-sm font-medium text-gray-700">Penerbit</label>
                        <div class="mt-2">
                            <input type="text" name="penerbit" id="penerbit" placeholder="Masukkan Penerbit Buku"
                                class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                    </div>

                    <!-- Tahun Terbit -->
                    <div>
                        <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
                        <div class="mt-2">
                            <input type="text" name="tahun" id="tahun" placeholder="Masukkan Tahun Terbit Buku"
                                class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                    </div>

                    <!-- Pengarang -->
                    <div class="sm:col-span-2">
                        <label for="pengarang" class="block text-sm font-medium text-gray-700">Pengarang</label>
                        <div class="mt-2">
                            <input type="text" name="pengarang" id="pengarang" placeholder="Masukkan Pengarang Buku"
                                class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                    </div>

                    {{-- <!-- Cover -->
                    <div class="col-span-full">
                        <label for="cover" class="block text-sm font-medium text-gray-700">Cover Buku</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-400 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm18 0H4v12h16V6zM8 10a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm text-gray-600 items-center">
                                    <label for="cover" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <input id="cover" name="cover" type="file" class="sr-only" required>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div> --}}
                    <label for="cover">cover</label>
                    <input type="file" name="cover">

                    <!-- Harga -->
                    <div>
                        <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                        <div class="mt-2">
                            <input type="text" name="harga" id="harga" placeholder="Masukkan Harga Buku"
                                class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                        <div class="mt-2">
                            <input type="number" name="stock" id="stock" placeholder="Masukkan Stock Buku"
                                class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-8">
                    <button type="submit"
                        class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline focus:ring-2 focus:ring-indigo-500">
                        Submit
                    </button>
                    <button type="submit"
                    class="inline-flex justify-center rounded-md bg-red-500 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-red-600 focus:outline focus:ring-2 focus:ring-indigo-500">
                    <a href="{{ route('admin.buku') }}">Beck</a>
                </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
