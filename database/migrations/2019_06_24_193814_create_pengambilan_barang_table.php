<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengambilanBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengambilan_barang', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->bigInteger('kode_barang')->unsigned();
            $table->timestamp('tanggal_pemesanan');
            $table->timestamp('tanggal_pengambilan')->nullable();
            $table->integer('jumlah');
            $table->string('status');            
            $table->foreign('kode_barang')->references('kode_barang')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengambilan_barang');
    }
}
