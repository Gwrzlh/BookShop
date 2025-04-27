<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi Kasir</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: gray;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        thead {
            background-color: #343a40;
            color: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            vertical-align: top;
        }
        th {
            text-align: center;
            font-weight: bold;
        }
        td ul {
            list-style-type: none;
            padding-left: 0;
        }
        td ul li {
            text-align: left;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Riwayat Transaksi Kasir</h1>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Nama Kasir</th>
                <th>Pembeli</th>
                <th>Tanggal Transaksi</th>
                <th>Tunai</th>
                <th>Total Transaksi</th>
                <th>Kembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $trans)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>
                    <ul>
                        @foreach ($trans->detailTransaksi as $detail) 
                        <li>{{ $detail->buku->judul }} x {{ $detail->jumlah }} = Rp{{ number_format($detail->buku->harga) }}</li>
                        @endforeach
                    </ul>
                </td>
                <td style="text-align: center;">{{ $trans->pengguna->nama_lengkap }}</td>
                <td style="text-align: center;">{{ $trans->nama_pembeli }}</td>
                <td style="text-align: center;">{{ $trans->tgl_beli }}</td>
                <td style="text-align: center;">Rp {{ number_format($trans->bayar) }}</td>
                <td style="text-align: center;">Rp {{ number_format($trans->total_harga) }}</td>
                <td style="text-align: center;">Rp {{ number_format($trans->kembalian) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
