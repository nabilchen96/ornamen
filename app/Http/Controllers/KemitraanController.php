<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Webinar;
use App\GroupPetani;
use DB;
use auth;

class KemitraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webinar    = Webinar::all();
        $group      = DB::table('group_petanis')
                        ->join('users', 'users.id', '=', 'group_petanis.id')
                        ->join('daftar_inventaris', 'daftar_inventaris.id_inventaris', '=', 'group_petanis.id_inventaris')
                        ->where('group_petanis.status', '1')
                        ->get();
        $konsultasi = DB::table('konsultasis')
                        ->where('id', auth::user()->id)
                        ->get();

        return view('pages.kemitraan.index')
            ->with('konsultasi', $konsultasi)
            ->with('group', $group)
            ->with('webinar', $webinar);
    }

    public function gabunggroup(Request $request){

        $request->validate([
            'id_inventaris'     => 'required',
            'nomor_telegram'    => 'required',
        ]);

        GroupPetani::create([
            'id_inventaris'     => $request->id_inventaris,
            'nomor_telegram'    => $request->nomor_telegram,
            'id'                =>  auth::user()->id
        ]);

        return back()->with(['sukses' => 'Data berhasil dikirim, silahkan tunggu proses verifikasi admin!']);

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
