<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKonsultasi extends Model
{
    protected $fillable = [
        'id_konsultasi', 'pesan', 'pemilik_pesan'
    ];
}
