<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    protected $primaryKey = 'id_webinar';
    protected $fillable = [
        'gambar', 'judul_acara', 'keterangan', 'jadwal', 'pemateri',
        'link'
    ];
}
