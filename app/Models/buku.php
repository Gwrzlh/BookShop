<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
  use HasFactory;

  protected $table = 'buku';
  
  public $timestamps = false;

  protected $primaryKey = 'id_buku';

  protected $fillable = ['judul', 'pengarang', 'penerbit', 'tahun', 'cover', 'harga', 'stock','kategori_id'];
  
  public function transaksi()
  {
      return $this->hasMany(transaksi::class, 'id_buku');
  }
  public function kategori()
  {
    return $this->belongsTo(kategori::class,'kategori_id');
  }
}
