<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventarisUser extends Model
{
    protected $primaryKey = 'id_inventaris_user';
    protected $fillable = [
        'id', 'id_inventaris', 'total_stok'
    ];
}
