<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JualHasil;
use Auth;
use DB;

class JualHasilController extends Controller
{
    public function index(){

        $data = DB::table('jual_hasils')->where('id', auth::user()->id)->get();

        $inven = DB::table('daftar_inventaris')
                    ->whereNotIn(
                        'id_inventaris', function($query){
                            $query->select('id_inventaris')
                            ->from('jual_hasils')
                            ->where('id', auth::user()->id);
                        }
                    )
                    ->where('jenis_inventaris', 'hasil')
                    ->get();

        return view('pages.jualhasil')
                ->with('data', $data)
                ->with('inven', $inven);
    }

    public function store(Request $request){

        $file       = $request->file('foto_produk');
        $nama_file  = $file->getClientOriginalName();
        $file->move('foto_produk', $nama_file);

        JualHasil::create([
            'id'                => $request->id,
            'id_inventaris'     => $request->id_inventaris,
            'stok'              => $request->stok,
            'harga'             => $request->harga,
            'ukuran_jual'       => $request->ukuran_jual,
            'foto_produk'       => $nama_file,
            'judul_keterangan'  => $request->judul_keterangan
        ]);


        return back()->with(['sukses' => 'Data berhasil disimpan!']);
    }

    public function update(Request $request){

        $data = JualHasil::find($request->id_jual_hasil);

        if($request->file('foto_produk') != null){
            $file           = $request->file('foto_produk');
            $nama_file      = $file->getClientOriginalName();
            $file->move('foto_produk',$file->getClientOriginalName());
        }else{
            $nama_file      = $data->foto_produk;
        }        

        $data->update([
            'harga'             => $request->harga,
            'ukuran_jual'       => $request->ukuran_jual,
            'foto_produk'       => $nama_file,
            'judul_keterangan'  => $request->judul_keterangan
        ]);

        return back()->with(['sukses' => 'Data berhasil disimpan!']);

    }

    public function updatestok(Request $request){

        $data = JualHasil::find($request->id_jual_hasil);

        if($request->operator == 'kurang'){
            $data->update([
                'stok' => $data->stok - $request->stok
            ]);
        }else{
            $data->update([
                'stok' => $data->stok + $request->stok
            ]);
        }

        return back()->with(['sukses' => 'Data stok berhasil diupdate!']);
    }
}
