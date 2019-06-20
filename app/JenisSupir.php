<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisSupir extends Model
{
    protected $table = "jenis_supir";
    protected $primaryKey = 'kode_jenis_supir';
    public $timestamps = false;

    public function supir(){
        return $this->hasMany('App\Supir', 'kode_supir');
    }
}
