<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = 'id_cart';
    protected $fillable = [
        'id', 'jumlah', 'harga', 'status', 'id_jual_hasil'
    ];
}
