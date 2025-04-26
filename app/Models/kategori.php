<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategori';

    protected $primarykey = 'id';

    protected $fillable = [
        'id',
        'nama_kategori',
    ];

    public function buku()
    {
        return $this->hasMany(buku::class, 'kategori_id' );
    }
}
