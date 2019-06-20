<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    protected $table = "armada";
    protected $primaryKey = 'kode_armada';
    public $timestamps = false;

    public function jenisKendaraan(){
        return $this->belongsTo('App\JenisKendaraan', 'kode_jenis_kendaraan');
    }
}
