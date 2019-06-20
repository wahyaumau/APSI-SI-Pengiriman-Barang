<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKendaraan extends Model
{
    protected $table = "jenis_kendaraan";
    public $timestamps = false;
    protected $primaryKey = 'kode_jenis_kendaraan';

    public function armada(){
        return $this->hasMany('App\Armada', 'kode_armada');
    }
}
