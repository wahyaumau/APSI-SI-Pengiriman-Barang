<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    protected $table = "pengambilan_barang";
    public $timestamps = false;     
    protected $dates = ['tanggal_pengambilan'];   

    public function barang(){
    	return $this->belongsTo('App\Barang', 'kode_barang');
    }

    public function supplier(){
    	return $this->belongsTo('App\Supplier', 'kode_supplier');
    }
}
