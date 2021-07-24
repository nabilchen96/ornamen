<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InventarisUser;
use auth;
use DB;
use App\InventarisMasuk;
use App\Keuangan;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('inventaris_users')
                    ->join('daftar_inventaris', 'daftar_inventaris.id_inventaris', '=', 'inventaris_users.id_inventaris')
                    ->where('inventaris_users.id', auth::user()->id)
                    ->get();
        
        return view('pages.inventory')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'            => 'required',
            'id_inventaris' => 'required',
            'stok_masuk'    => 'required',
            'biaya'         => 'required'
        ]);

        $create_data = InventarisMasuk::create([
            'id'            => $request->id,
            'id_inventaris' => $request->id_inventaris,
            'stok_masuk'    => $request->stok_masuk,
            'biaya'         => $request->biaya,
        ]);

        $data = DB::table('daftar_inventaris')->where('id_inventaris', $request->id_inventaris)->first();

        // dd($create_data->id);

        Keuangan::create([
            'id'            => $request->id,
            'keterangan'    => 'Stok Inventaris '.$data->jenis_inventaris.' '.$data->nama_inventaris,
            'jenis_saldo'   => 'keluar',
            'id_keluar'     => $create_data->id,
            'biaya'         => $request->biaya,
            'tanggal'       => now()
        ]);


        $data = DB::table('inventaris_users')->where('id', $request->id)->where('id_inventaris', $request->id_inventaris)->first();

        // dd($data->id_inventaris_user);

        if($data){
            $idinventarisuser = InventarisUser::find($data->id_inventaris_user);
            $idinventarisuser->update([
                'total_stok'     => $data->total_stok + $request->stok_masuk
             ]);
        }else{
            InventarisUser::create([
               'id'             => $request->id,
               'id_inventaris'  => $request->id_inventaris,
               'total_stok'     => $request->stok_masuk 
            ]);
        }

        return back()->with(['sukses' => 'Data berhasil disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
