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

Route::prefix('pemesanan_barang')->group(function(){	
	Route::get('/konfirmasi/pemesanan/{penjualan}', 'PemesananBarangController@konfirmasiPemesanan')->name('pemesanan.barang.konfirmasi.pemesanan');
	Route::get('/list/pemesanan', 'PemesananBarangController@showKonfirmasiPemesananForm')->name('pemesanan.barang.konfirmasi.pemesanan.form');
	Route::post('/store/barang/{penjualan}', 'PelangganController@storePemesananBarang')->name('pemesanan.barang.store.barang');
	Route::get('/create/barang/{penjualan}', 'PelangganController@createPemesananBarang')->name('pemesanan.barang.create.barang');
	Route::get('/form_pemesanan/{penjualan}', 'PelangganController@showPemesananForm')->name('pemesanan.barang.form.pemesanan');
	Route::get('/list_pemesanan', 'PelangganController@showListPemesanan')->name('pemesanan.barang.list.pemesanan');
	Route::get('/', 'PelangganController@createNewPemesanan')->name('pemesanan.barang');
});

Route::get('/', function () {
    return view('template');
});

Auth::routes();

Route::prefix('owner')->group(function(){
	Route::get('/login', 'Auth\OwnerLoginController@showLoginForm')->name('owner.login');
	Route::post('/login', 'Auth\OwnerLoginController@login')->name('owner.login.submit');
	Route::get('/logout', 'Auth\OwnerLoginController@logout')->name('owner.logout');	
	Route::get('/logout', 'Auth\OwnerLoginController@logout')->name('owner.logout');	
	Route::get('/', 'OwnerController@dashboard')->name('owner.dashboard');
});

Route::prefix('supplier')->group(function(){
	Route::get('/register', 'Auth\SupplierRegisterController@showRegistrationForm')->name('supplier.register');
	Route::post('/register', 'Auth\SupplierRegisterController@register')->name('supplier.register.submit');
	Route::get('/login', 'Auth\SupplierLoginController@showLoginForm')->name('supplier.login');
	Route::post('/login', 'Auth\SupplierLoginController@login')->name('supplier.login.submit');
	Route::get('/logout', 'Auth\SupplierLoginController@logout')->name('supplier.logout');	
	Route::get('/logout', 'Auth\SupplierLoginController@logout')->name('supplier.logout');	
	Route::get('/', 'SupplierController@dashboard')->name('supplier.dashboard');
});

Route::prefix('pelanggan')->group(function(){	
	Route::get('/', 'PelangganController@dashboard')->name('pelanggan.dashboard');
});

Route::get('/home', 'HomeController@index')->name('home');
