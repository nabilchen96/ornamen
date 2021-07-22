<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengelolaanKebun extends Model
{
    protected $primaryKey = 'id_kelola_kebun';
    protected $fillable = [
        'id', 'id_tanaman', 'tanaman_dipakai', 'id_pupuk',
        'pupuk_dipakai', 'id_media_tanam', 'media_tanam_dipakai',
        'luas_tanah', 'waktu_tanam'
    ];
}
