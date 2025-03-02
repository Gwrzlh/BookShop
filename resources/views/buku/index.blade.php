<div>
    <div>
        <a href="{{ route('buku.create') }}">Tambah buku</a>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Cover</th>
                <th>Judul</th>
                <th>penerbit</th>
                <th>pengarang</th>
                <th>Tahun Terbit</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ( $bukus as $buku )
            <tr>
              
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    <img src="{{ asset('storage/cover/' . $buku->cover) }}" alt="cover buku">

                </td>   
                <td>
                    {{ $buku->judul }}    
                </td>  
                <td>
                    {{ $buku->penerbit }}
                </td>
                <td>
                    {{ $buku->pengarang }}
                </td>
                <td>
                    {{ $buku->tahun }}
                </td>
                <td>
                    {{ $buku->harga }}
                </td>
                <td>
                    {{ $buku->stock }}
                </td>
                <td>
                  <a href="{{ route('buku.edit', $buku->id_buku) }}">Edit</a>
                  <form action="{{ route('buku.destroy', $buku->id_buku) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
                </td>
            </tr>
            @endforeach       

    </table>
</div>