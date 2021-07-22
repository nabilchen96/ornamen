<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DaftarInventaris;

class DaftarInventarisController extends Controller
{
    public function index($jenis_inventaris){

        $users  = DaftarInventaris::where('jenis_inventaris', $jenis_inventaris)->get();
        return response([
            $users
        ]);
    }
}
