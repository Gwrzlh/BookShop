<div>
    <div>
        <h1>Kasir!</h1>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Nama Kasir</th>
                <th>Pembeli</th>
                <th>tanggal transaksi</th>
                <th>Tunai</th>
                <th>Kembalian</th>
                <th>Total transaksi</th>
                {{-- <th>Action</th> --}}
            </tr>
            @foreach ($transaksi as $trans)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $trans->buku->judul }}</td>
                <td>{{ $trans->pengguna->nama_lengkap }}</td>
                <td>{{ $trans->nama_pembeli }}</td>
                <td>{{ $trans->tgl_beli }}</td>
                <td>{{ $trans->bayar }}</td>
                <td>{{ $trans->kembalian }}</td>
                <td>{{ $trans->total_harga }}</td>
                {{-- <td>
                    {{-- <form action="{{ route('transaksi.destroy', $trans->id_transaksi) }}"  method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form> --}}
                {{-- </td> --}} 
            </tr>
            @endforeach
        </table>
    </div>
</div>