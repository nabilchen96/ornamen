<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    protected $primaryKey = 'id_aktivitas';
    protected $fillable = [
        'id', 'nama_kegiatan', 'keterangan_kegiatan', 'mulai_kegiatan', 'akhir_kegiatan'
    ];
}
