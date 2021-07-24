<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keuangan;
use DB;
use Auth;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Keuangan::where('id', auth::user()->id)->get();

        return view('pages.keuangan')->with('data', $data);
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
        Keuangan::create([
            'id'            => $request->id,
            'keterangan'    => $request->keterangan,
            'jenis_saldo'   => $request->jenis_saldo,
            'biaya'         => $request->biaya,
            'tanggal'       => $request->tanggal
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
        //
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
    public function update(Request $request)
    {

        // dd($request);
        
        $data = Keuangan::find($request->id_keuangan);

        $data->update([
            'id'            => $request->id,
            'keterangan'    => $request->keterangan,
            'jenis_saldo'   => $request->jenis_saldo,
            'biaya'         => $request->biaya,
            'tanggal'       => $request->tanggal
        ]);

        return back()->with(['sukses' => 'Data berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Keuangan::find($id);
        $data->delete();

        return back()->with(['sukses' => 'Data berhasil dihapus!']);
    }
}
