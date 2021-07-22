<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use auth;
use App\PengelolaanKebun;
use App\InventarisUser;
use App\Aktivitas;

class PengelolaanKebunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = DB::table('daftar_inventaris')
                    ->join('inventaris_users', 'inventaris_users.id_inventaris', '=', 'daftar_inventaris.id_inventaris')
                    ->where('inventaris_users.id', auth::user()->id)
                    ->get();

        $bibit          = $data->where('jenis_inventaris', 'bibit')->all();

        $pupuk          = $data->where('jenis_inventaris', 'pupuk')->all();

        $media_tanam    = $data->where('jenis_inventaris', 'media tanam')->all();


        //data tanaman
        $kelola_tanaman = DB::table('pengelolaan_kebuns')
                            //join bibit tanaman
                            ->join('inventaris_users as tanaman', 'tanaman.id_inventaris_user', '=', 'pengelolaan_kebuns.id_tanaman')
                            ->join('daftar_inventaris as daftar_tanaman','daftar_tanaman.id_inventaris','=', 'tanaman.id_inventaris')
                            //join media tanam
                            ->join('inventaris_users as pupuk', 'pupuk.id_inventaris_user', '=', 'pengelolaan_kebuns.id_pupuk')
                            ->join('daftar_inventaris as daftar_pupuk','daftar_pupuk.id_inventaris','=', 'pupuk.id_inventaris')
                            //join pupuk
                            ->join('inventaris_users as media_tanam', 'media_tanam.id_inventaris_user', '=', 'pengelolaan_kebuns.id_media_tanam')
                            ->join('daftar_inventaris as daftar_media','daftar_media.id_inventaris','=', 'media_tanam.id_inventaris')
                           ->select(
                               'pengelolaan_kebuns.id_kelola_kebun',
                               'daftar_tanaman.nama_inventaris as nama_tanaman',
                               'daftar_pupuk.nama_inventaris as nama_pupuk',
                               'daftar_media.nama_inventaris as nama_media',
                               'pengelolaan_kebuns.luas_tanah',
                               'pengelolaan_kebuns.waktu_tanam'
                           )
                            ->where('pengelolaan_kebuns.id', auth::user()->id)
                            ->get();

        // dd($kelola_tanaman);

        return view('pages.pengelolaankebun')
                ->with('kelola_tanaman', $kelola_tanaman)
                ->with('bibit', $bibit)
                ->with('pupuk', $pupuk)
                ->with('media_tanam', $media_tanam);
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
        //simpan ke tabel pengelolaan kebun
        $bibit = InventarisUser::find($request->id_tanaman);
        $pupuk = InventarisUser::find($request->id_pupuk);
        $media = InventarisUser::find($request->id_media_tanam);
        // dd($media->total_stok);

        if($bibit->total_stok < $request->tanaman_dipakai){
            return back()->with(['gagal' => 'Bibit melebihi stok']);
        }elseif($pupuk->total_stok < $request->pupuk_dipakai){
            return back()->with(['gagal' => 'Pupuk melebihi stok']);
        }elseif($media->total_stok < $request->media_tanam_dipakai){
            return back()->with(['gagal' => 'Media Tanam melebihi stok']);
        }

        // dd($request);

        PengelolaanKebun::create([
            'id'                    => $request->id,
            'id_tanaman'            => $request->id_tanaman,
            'tanaman_dipakai'       => $request->tanaman_dipakai,
            'id_pupuk'              => $request->id_pupuk,
            'pupuk_dipakai'         => $request->pupuk_dipakai,
            'id_media_tanam'        => $request->id_media_tanam,
            'media_tanam_dipakai'   => $request->media_tanam_dipakai,
            'luas_tanah'        => $request->luas_tanah,
            'waktu_tanam'       => $request->waktu_tanam
        ]);


        //kurangi ke tabel inventaris
        $bibit->update([
            'total_stok'     => $bibit->total_stok - $request->tanaman_dipakai
        ]);

        $pupuk->update([
            'total_stok'     => $pupuk->total_stok - $request->pupuk_dipakai
        ]);

        $media->update([
            'total_stok'     => $media->total_stok - $request->media_tanam_dipakai
        ]);
        

        //simpan ke tabel aktivitas
        Aktivitas::create([
            'id'                    => $request->id,
            'nama_kegiatan'         => 'melakukan penanaman bibit',
            'keterangan_kegiatan'   => 'melakukan penanaman bibit',
            'mulai_kegiatan'        => $request->waktu_tanam,
            'akhir_kegiatan'        => $request->waktu_tanam
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
