<?php

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

Route::resource('jenis_kendaraan', 'JenisKendaraanController');
Route::resource('armada', 'ArmadaController');
Route::resource('jenis_supir', 'JenisSupirController');
Route::resource('supir', 'SupirController');
Route::resource('gudang', 'GudangController');
Route::resource('barang', 'BarangController');

Route::get('/', function () {
    return view('template');
});