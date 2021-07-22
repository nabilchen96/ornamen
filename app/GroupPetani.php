<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupPetani extends Model
{
    protected $primaryKey = 'id_group';
    protected $fillable = [
        'id_inventaris', 'id', 'nomor_telegram', 'status'
    ];
}
