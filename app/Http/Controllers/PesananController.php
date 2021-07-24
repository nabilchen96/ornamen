<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\BeliHasil;
use App\DetailBeliHasil;
use App\Keuangan;
use App\Cart;
use App\JualHasil;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = DB::table('beli_hasils')
                    ->join('detail_beli_hasils', 'detail_beli_hasils.id_beli_hasil', '=', 'beli_hasils.id_beli_hasil')
                    ->where('beli_hasils.id', auth::user()->id)
                    ->get();

        return view('pages.pesanan');
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
        // dd($request->total_harga[0]);

        // input ke tabel beli hasil
        $belihasil = BeliHasil::create([
            'id'                => auth::user()->id,
            'total_harga'       => $request->total_harga,
            'biaya_pengiriman'  => $request->biaya_pengiriman,
            'grand_total'       => $request->grand_total,
            'status'            => 'belum dibayar',
            'resi'              => 'belum diinput'
        ]);

        //input ke tabel detail_beli_hasils
        foreach ($request->id_jual_hasil as $key => $value) {
            DetailBeliHasil::create([
                'id_beli_hasil' => $belihasil->id_beli_hasil,
                'id_jual_hasil' => $value,
                'jumlah'        => $request->jumlah[$key],
                'harga'         => $request->harga[$key]
            ]);
        }

        //ambil data jual hasil
        foreach ($request->id_jual_hasil as $key => $value) {
            
            $jualhasil = JualHasil::find($value);

            //input ke tabel keuangan
            Keuangan::create([
                'id'            => $jualhasil->id,
                'keterangan'    => 'penjualan '.$jualhasil->judul_keterangan.' jumlah: '.$request->jumlah[$key].' '.$jualhasil->ukuran_jual,
                'id_masuk'      => $belihasil->id_beli_hasil,
                'jenis_saldo'   => 'masuk',
                'biaya'         => $request->harga[$key],
                'tanggal'       => $belihasil->created_at
            ]);

        }


        //ubah status di tabel cart
        foreach ($request->id_cart as $key => $value) {
            
            $cart = Cart::find($value);
            $cart->update([
                'status'    => '1',
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
