<div class="card-body">
    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $kate)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kate->nama_kategori }}</td>

                    <td>
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kategori.destroy', $pengguna->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>