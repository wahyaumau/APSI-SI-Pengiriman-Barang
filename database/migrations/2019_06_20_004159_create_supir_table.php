<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supir', function (Blueprint $table) {
            $table->bigIncrements('kode_supir');
            $table->string('nama_supir');
            $table->text('alamat_supir');
            $table->string('sim');
            $table->bigInteger('kode_jenis_supir')->unsigned();            
            $table->foreign('kode_jenis_supir')->references('kode_jenis_supir')->on('jenis_supir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supir');
    }
}
