<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail';
    public $timestamps = false;

    protected $fillable = [
        'id_transaksi',
        'id_buku',
        'jumlah',
        'subtotal',
    ];

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class, 'id_transaksi');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
