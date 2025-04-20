<div class="container py-5">
    {{-- <div class="mb-4 text-center">
        <h1 class="fw-bold text-primary">Riwayat Transaksi Kasir</h1>
    </div> --}}

    <div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No.</th>
                            <th>Judul Buku</th>
                            <th>Nama Kasir</th>
                            <th>Pembeli</th>
                            <th>Tanggal Transaksi</th>
                            <th>Tunai</th>
                            <th>Kembalian</th>
                            <th>Total Transaksi</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($transaksi as $trans)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $trans->buku->judul }}</td>
                            <td>{{ $trans->pengguna->nama_lengkap }}</td>
                            <td>{{ $trans->nama_pembeli }}</td>
                            <td>{{ $trans->tgl_beli }}</td>
                            <td>Rp {{ number_format($trans->bayar, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($trans->kembalian, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($trans->total_harga, 0, ',', '.') }}</td>
                            {{-- <td>
                                <form action="{{ route('transaksi.destroy', $trans->id_transaksi) }}"  method="POST" onsubmit="return confirm('Yakin ingin menghapus transaksi ini?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>