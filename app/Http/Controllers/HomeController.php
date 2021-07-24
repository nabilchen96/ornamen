<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JualHasil;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $produk = JualHasil::all();

        $produk = $produk->take(8);

        return view('pages.home')->with('produk', $produk);
    }
}
