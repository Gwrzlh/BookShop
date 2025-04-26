<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Struk Transaksi</title>
    <style>
        body {
            font-family: monospace;
            font-size: 12px;
        }
        .struk {
            width: 260px;
            padding: 10px;
            margin: auto;
        }
        .center {
            text-align: center;
        }
        .line {
            border-bottom: 1px dashed #000;
            margin: 5px 0;
        }
        table {
            width: 100%;
        }
        td {
            vertical-align: top;
        }
    </style>
</head>
<body>
    <div class="struk">
        <div class="center">
            <strong>DapBookShop</strong><br>
            Jl. Arief Rahman Hakim<br>
            --------------------------
        </div>

        <div>
            Tanggal: {{ date('d-m-Y H:i') }}<br>
            Kasir: {{ $transaksi->pengguna->nama }}
        </div>

        <div class="line"></div>

        <table>
            @foreach ($transaksi->detailTransaksi as $item)
            <tr>
                <td colspan="2">{{ $item->buku->judul }}</td>
            </tr>
            <tr>
                <td>{{ $item->jumlah }} x Rp{{ number_format($item->harga) }}</td>
                <td style="text-align: right;">Rp{{ number_format($item->subtotal) }}</td>
            </tr>
            @endforeach
        </table>

        <div class="line"></div>

        <table>
            <tr>
                <td><strong>Total</strong></td>
                <td style="text-align: right;"><strong>Rp{{ number_format($transaksi->total_harga) }}</strong></td>
            </tr>
            <tr>
                <td>Bayar</td>
                <td style="text-align: right;">Rp{{ number_format($transaksi->bayar) }}</td>
            </tr>
            <tr>
                <td>Kembali</td>
                <td style="text-align: right;">Rp{{ number_format($transaksi->kembalian) }}</td>
            </tr>
        </table>

        <div class="center" style="margin-top: 10px;">
            Terima Kasih<br>
            DapBookShop
        </div>
    </div>
</body>
</html>
