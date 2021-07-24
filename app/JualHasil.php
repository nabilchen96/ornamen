<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JualHasil extends Model
{
    protected $primaryKey = 'id_jual_hasil';
    protected $fillable = [
        'id_inventaris', 'id', 'stok', 'harga', 'foto_produk', 'ukuran_jual', 'judul_keterangan'
    ];
}
