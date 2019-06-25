<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barang";
    protected $primaryKey = 'kode_barang';
    public $timestamps = false;

    public function penjualan(){
    	return $this->belongsToMany('App\Penjualan', 'penjualan_barang', 'kode_barang', 'kode_penjualan')->withPivot('jumlah_barang', 'harga_barang');		
    }

    public function supplier(){
    	return $this->belongsTo('App\Supplier', 'kode_supplier');			
    }
}
