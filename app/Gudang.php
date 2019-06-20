<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    protected $table = "gudang";
    protected $primaryKey = 'kode_gudang';
    public $timestamps = false;

    // public function barang(){
    //     return $this->hasMany('App\Barang', 'kode_barang');
    // }
}
