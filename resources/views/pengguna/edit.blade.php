<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-8">

    <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
        <div class="border-b border-gray-300 pb-12">
            <h1 class="text-2xl font-semibold text-gray-900 mb-8">Tambah Pengguna</h1>

            <form action="{{ route('pengguna.store') }}" method="post" class="space-y-8">
                @csrf

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <div class="mt-2">
                        <input type="text" name="username" id="username" placeholder="Masukkan Username"
                            class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $penggunas->username }}">
                    </div>
                </div>

                <!-- Nama Lengkap -->
                <div>
                    <label for="namaLengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <div class="mt-2">
                        <input type="text" name="namaLengkap" id="namaLengkap" placeholder="Masukkan Nama Lengkap Anda"
                            class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $penggunas->nama_lengkap }}">
                    </div>
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <div class="mt-2">
                        <select name="role" id="role"
                            class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $penggunas->role }}">
                            <option value="Admin">Admin</option>
                            <option value="Owner">Owner</option>
                            <option value="Kasir">Kasir</option>
                        </select>
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" placeholder="Min 7 karakter"
                            class="block w-full rounded-md border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>
                </div>

                <!-- Password Confirmation -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <div class="mt-2">
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password Diatas"
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
                    <a href="{{ route('admin.pengguna') }}">Beck</a>
                </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
