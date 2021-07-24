<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBeliHasil extends Model
{
    protected $primaryKey = 'id_detail_beli_hasil';
    protected $fillable = [
        'id_beli_hasil', 'id_jual_hasil', 'jumlah', 'harga'
    ];
}
