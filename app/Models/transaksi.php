<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
   protected $table = 'transaksi';
    public $timestamps = false; 
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_transaksi', 'id_buku', 'id_pengguna','nama_pembeli','tgl_beli','bayar','kembalian','total_harga'];
    public function buku()
    {
        return $this->belongsTo(buku::class, 'id_buku');
    }
    public function pengguna()
    {
        return $this->belongsTo(pengguna::class, 'id_pengguna');
    }
}
