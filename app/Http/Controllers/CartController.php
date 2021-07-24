<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use DB;
use App\Cart;
use App\JualHasil;

class CartController extends Controller
{
    public function index(){


        $data = DB::table('carts')
                    ->join('jual_hasils', 'jual_hasils.id_jual_hasil', '=', 'carts.id_jual_hasil')
                    ->join('users', 'users.id', '=', 'jual_hasils.id')
                    ->select(
                        'users.*',
                        'jual_hasils.harga',
                        'jual_hasils.judul_keterangan',
                        'carts.harga as total_harga',
                        'jual_hasils.foto_produk',
                        'carts.jumlah',
                        'carts.id_cart',
                        'jual_hasils.id_jual_hasil'
                    )
                    ->where('carts.id', auth::user()->id)
                    ->where('carts.status', '0')
                    ->get();

        return view('pages.cart')->with('data', $data);
    }

    public function success(){
        return view('pages.success');
    }

    public function store(Request $request){

        $data = JualHasil::find($request->id_jual_hasil);

        if($data->stok < $request->jumlah){
            return back()->with(['gagal' => 'qty melebihi jumlah stok!']);
        }

        $incart = Cart::where('id_jual_hasil', $request->id_jual_hasil)->where('status', '0')->first();

        if($incart){
            $updatecart = Cart::find($incart->id_cart);

            $updatecart->update([
                'jumlah'    => $updatecart->jumlah + $request->jumlah,
                'harga'     => ($updatecart->jumlah + $request->jumlah) * $request->harga
            ]);

        }else{
            Cart::create([
                'id_jual_hasil' => $request->id_jual_hasil,
                'jumlah'        => $request->jumlah,
                'harga'         => $request->harga * $request->jumlah,
                'id'            => auth::user()->id
            ]);
        }

        //kurangi stok
        $data->update([
            'stok'  => $data->stok - $request->jumlah
        ]);

        return back()->with(['sukses' => 'Data telah tersimpan di keranjang!']);
    }

    public function destroy($id){


        $data = Cart::find($id);
        $jual_hasil = JualHasil::find($data->id_jual_hasil);

        $jual_hasil->update([
            'stok'  => $jual_hasil->stok + $data->jumlah
        ]);
        $data->delete();
        
        return back()->with(['sukses' => 'Cart telah dihapus!']);
    }
}
