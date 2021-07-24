<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $primaryKey = 'id_keuangan';
    protected $fillable = [
        'id', 'id_keluar', 'id_masuk', 'keterangan', 'jenis_saldo', 'biaya', 'tanggal'
    ];
}
