<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barang";
    protected $primaryKey = 'kode_barang';
    public $timestamps = false;
}
