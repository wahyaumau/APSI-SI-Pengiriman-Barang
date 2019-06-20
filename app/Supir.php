<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    protected $table = "supir";
    protected $primaryKey = 'kode_supir';
    public $timestamps = false;

    public function jenisSupir(){
        return $this->belongsTo('App\JenisSupir', 'kode_jenis_supir');
    }
}
