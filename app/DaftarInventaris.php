<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarInventaris extends Model
{
    protected $primaryKey = 'id_inventaris';
    protected $fillable = [
       'jenis_inventaris', 'nama_inventaris', 'satuan_inventaris'
    ];
}
