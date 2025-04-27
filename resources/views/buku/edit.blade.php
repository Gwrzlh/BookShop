<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Buku</title>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-8">

    <div class="space-y-12 w-full max-w-4xl">
        <div class="border-b border-gray-300 pb-12">
            <div class="font-display text-2xl font-semibold leading-7 text-gray-900 mb-8">
                <h1>✏️ Edit Buku</h1>
            </div>

            <form action="{{ route('buku.update', $buku->id_buku) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <!-- Judul -->
                    <div class="sm:col-span-2">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                        <div class="mt-2">
                            <input type="text" name="judul" id="judul" value="{{ $buku->judul }}" placeholder="Judul buku"
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
                                    <option value="{{ $kate->id }}" {{ $buku->id_kategori == $kate->id ? 'selected' : '' }}>
                                        {{ $kate->nama_Kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Penerbit -->
                    <div>
                        <label for="penerbit" class="block text-sm font-medium text-gray-700">Penerbit</label>
                        <div class="mt-2">
                            <input type="text" name="penerbit" id="penerbit" value="{{ $buku->penerbit }}" placeholder="Masukkan Penerbit Buku"
                                class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                    </div>

                    <!-- Tahun Terbit -->
                    <div>
                        <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
                        <div class="mt-2">
                            <input type="text" name="tahun" id="tahun" value="{{ $buku->tahun }}" placeholder="Masukkan Tahun Terbit Buku"
                                class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                    </div>

                    <!-- Pengarang -->
                    <div class="sm:col-span-2">
                        <label for="pengarang" class="block text-sm font-medium text-gray-700">Pengarang</label>
                        <div class="mt-2">
                            <input type="text" name="pengarang" id="pengarang" value="{{ $buku->pengarang }}" placeholder="Masukkan Pengarang Buku"
                                class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                    </div>

                    <!-- Cover -->
                    <div class="sm:col-span-2">
                        <label for="cover" class="block text-sm font-medium text-gray-700">Cover Buku (Upload Baru Jika Ingin Mengganti)</label>
                        <div class="mt-2">
                            <input type="file" name="cover" id="cover"
                                class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-50 file:text-indigo-700
                                hover:file:bg-indigo-100" accept="image/*">
                        </div>

                        @if ($buku->cover)
                            <div class="mt-4">
                                <p class="text-sm text-gray-600 mb-2">Cover saat ini:</p>
                                <img src="{{ asset('storage/cover/' . $buku->cover) }}" alt="Cover Buku" class="h-48 object-cover rounded-md">
                            </div>
                        @endif
                    </div>

                    <!-- Harga -->
                    <div>
                        <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                        <div class="mt-2">
                            <input type="text" name="harga" id="harga" value="{{ $buku->harga }}" placeholder="Masukkan Harga Buku"
                                class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                        <div class="mt-2">
                            <input type="number" name="stock" id="stock" value="{{ $buku->stock }}" placeholder="Masukkan Stock Buku"
                                class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="pt-8 flex space-x-4">
                    <button type="submit"
                        class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline focus:ring-2 focus:ring-indigo-500">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.buku') }}"
                        class="inline-flex justify-center rounded-md bg-red-500 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-red-600 focus:outline focus:ring-2 focus:ring-red-500">
                        kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
