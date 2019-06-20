<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArmadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armada', function (Blueprint $table) {
            $table->bigIncrements('kode_armada');
            $table->bigInteger('kode_jenis_kendaraan')->unsigned();
            $table->string('plat_nomor');
            $table->foreign('kode_jenis_kendaraan')->references('kode_jenis_kendaraan')->on('jenis_kendaraan');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('armada');
    }
}
