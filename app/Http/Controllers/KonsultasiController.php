<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konsultasi;
use DB;
use auth;
use App\DetailKonsultasi;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
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
            'id'    => 'required',
            'judul_konsultasi'  => 'required'
        ]);

        Konsultasi::create([
            'id'                => $request->id,
            'judul_konsultasi'  => $request->judul_konsultasi,
            'status_konsultasi' => '0'
        ]);

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

        $data = DB::table('konsultasis')
                    ->leftjoin('detail_konsultasis', 'detail_konsultasis.id_konsultasi', '=', 'konsultasis.id_konsultasi')
                    ->where('konsultasis.id_konsultasi', $id)
                    ->select(
                        'konsultasis.id_konsultasi',
                        'konsultasis.judul_konsultasi',
                        'konsultasis.created_at as konsultasi_dibuat',
                        'detail_konsultasis.pemilik_pesan',
                        'detail_konsultasis.created_at as detail_konsultasi_dibuat',
                        'detail_konsultasis.pesan'
                    )
                    ->get();

        // dd($data->values());
        
        return view('pages.kemitraan.konsultasi')->with('data', $data);
    }

    public function detailkonsultasi(Request $request){
        
        $request->validate([
            'pesan'         => 'required',
            'id_konsultasi' => 'required',
            'pesan'         => 'required',
            'pemilik_pesan' => 'required'
        ]);

        DetailKonsultasi::create([
            'pesan'         => $request->pesan,
            'id_konsultasi' => $request->id_konsultasi,
            'pesan'         => $request->pesan,
            'pemilik_pesan' => $request->pemilik_pesan
        ]);

        return back()->with(['sukses' => 'Data berhasil disimpan!']);
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
