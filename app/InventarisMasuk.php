<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventarisMasuk extends Model
{
    protected $fillable = [
        'id', 'id_inventaris', 'stok_masuk', 'biaya'
    ];
}
