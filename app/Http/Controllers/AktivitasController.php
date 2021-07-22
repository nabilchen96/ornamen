<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aktivitas;
use auth;

class AktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Aktivitas::where('id', auth::user()->id)->get();

        return view('pages.aktivitas')->with('data', $data);
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
            'id'                    => 'required',
            'nama_kegiatan'         => 'required',
            'keterangan_kegiatan'   => 'required',
            'mulai_kegiatan'        => 'required',
            'akhir_kegiatan'        => 'required',
        ]);

        Aktivitas::create([
            'id'                    => $request->id,
            'nama_kegiatan'         => $request->nama_kegiatan,
            'keterangan_kegiatan'   => $request->keterangan_kegiatan,
            'mulai_kegiatan'        => $request->mulai_kegiatan,
            'akhir_kegiatan'        => $request->akhir_kegiatan
        ]);

        return back()->with(['sukses' => 'Data Berhasil disimpan!']);
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
        $request->validate([
            'id'                    => 'required',
            'nama_kegiatan'         => 'required',
            'keterangan_kegiatan'   => 'required',
            'id_aktivitas'          => 'required',
            'mulai_kegiatan'        => 'required',
            'akhir_kegiatan'        => 'required',
        ]);

        $data = Aktivitas::find($request->id_aktivitas);
        $data->update([
            'id'                    => $request->id,
            'nama_kegiatan'         => $request->nama_kegiatan,
            'keterangan_kegiatan'   => $request->keterangan_kegiatan,
            'mulai_kegiatan'        => $request->mulai_kegiatan,
            'akhir_kegiatan'        => $request->akhir_kegiatan,
        ]);

        return back()->with(['sukses' => 'Data Berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Aktivitas::find($id);
        $data->delete();

        return back()->with(['sukses' => 'Data berhasil dihapus!']);
    }
}
