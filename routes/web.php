<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/details/{id}', 'DetailController@index')->name('detail');
Route::get('/success', 'CartController@success')->name('success');

//kontak
Route::resource('kontak', 'KontakController');

//profil
Route::resource('profil', 'ProfilController');

//pengelolaan kebun
Route::resource('pengelolaankebun', 'PengelolaanKebunController');

//aktivitas
Route::resource('aktivitas', 'AktivitasController');
Route::post('updateaktivitas', 'AktivitasController@update');
Route::get('hapusaktivitas/{id}', 'AktivitasController@destroy');

//kemitraan & konsultasi
Route::resource('kemitraan', 'KemitraanController');
Route::post('tambahgabunggroup', 'KemitraanController@gabunggroup');

//detail konsultasi
Route::post('tambahkonsultasi', 'KonsultasiController@store');
Route::get('konsultasi/{id}', 'KonsultasiController@show');
Route::post('simpandetailkonsultasi', 'KonsultasiController@detailkonsultasi');

//Inventory
Route::resource('inventory', 'InventoryController');

//keuangan
Route::resource('keuangan', 'KeuanganController');
Route::get('hapuskeuangan/{id}', 'KeuanganController@destroy');
Route::post('updatekeuangan', 'KeuanganController@update');

//Jual Hasil
Route::get('jualhasil', 'JualHasilController@index');
Route::post('simpanjualhasil', 'JualHasilController@store');
Route::post('updatejualhasil', 'JualHasilController@update');
Route::post('updatestokjualhasil', 'JualHasilController@updatestok');

//daftar_inventaris
Route::get('daftar_inventaris/{jenis_inventaris}', 'DaftarInventarisController@index');

//cart
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('simpancart', 'CartController@store');
Route::get('/hapuscart/{id}', 'CartController@destroy');


Route::resource('pesanan', 'PesananController');


Route::prefix('admin')->namespace('Admin')->group(function(){
    
    Route::get('/', 'DashboardController@index')->name('admin-dashboard');
    Route::resource('category', 'CategoryController');
});