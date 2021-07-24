<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeliHasil extends Model
{
    protected $primaryKey = 'id_beli_hasil';
    protected $fillable = [
        'id', 'total_harga', 'biaya_pengiriman', 'grand_total', 'status', 'resi'
    ];
}
