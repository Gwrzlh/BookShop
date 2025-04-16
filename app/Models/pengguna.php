<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
  use HasFactory;

  protected $table = 'pengguna';

  public $timestamps = false;
  protected $primaryKey = 'id_pengguna';

  protected $fillable = ['username', 'nama_lengkap', 'role', 'password'];
   
  public function transaksi()
  {
      return $this->hasMany(transaksi::class, 'id_pengguna');
  }
  
}
