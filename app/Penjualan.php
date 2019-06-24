<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = "penjualan";
    public $timestamps = false;
    protected $primaryKey = 'kode_penjualan';
    public $incrementing = false;

    public function barang(){
    	return $this->belongsToMany('App\Barang', 'penjualan_barang', 'kode_penjualan', 'kode_barang')->withPivot('jumlah_barang', 'harga_barang');		
    }

    public function pelanggan(){
    	return $this->belongsTo('App\Pelanggan', 'kode_pelanggan');
    }
}
