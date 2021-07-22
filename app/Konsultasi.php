<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $primaryKey = 'id_konsultasi';
    protected $fillable = [
        'id', 'judul_konsultasi', 'status_konsultasi'
    ];
}
