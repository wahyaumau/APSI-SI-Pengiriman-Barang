<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualanBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_barang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kode_barang')->unsigned();
            $table->string('kode_penjualan');
            $table->integer('jumlah_barang');
            $table->integer('harga_barang');
            $table->foreign('kode_penjualan')->references('kode_penjualan')->on('penjualan');
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
        Schema::dropIfExists('penjualan_barang');
    }
}
