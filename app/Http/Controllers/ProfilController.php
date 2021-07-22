<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.profile');
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
        //
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
        $request->validate([
            'name'  => 'required',
            'jk'    => 'required',
            'foto'  => 'image'
        ]);

        if($request->file('foto') != null){
            $file           = $request->file('foto');
            $nama_file      = $file->getClientOriginalName();
            $file->move('foto_profil',$file->getClientOriginalName());
        }else{
            $nama_file      = null;
        }

        $data = User::find($id);
        $data->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'jk'        => $request->jk,
            'nama_toko' => $request->nama_toko,
            'email'     => $request->email,
            'notelp'    => $request->notelp,
            'alamat'    => $request->alamat,
            'facebook'  => $request->facebook,
            'twitter'   => $request->twitter,
            'instagram' => $request->instagram,
            'tiktok'    => $request->tiktok,
            'foto'      => $nama_file,
        ]);

        return back()->with(['sukses' => 'Data berhasil diperbarui']);
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
