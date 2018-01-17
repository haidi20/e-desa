<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip')->nullable();
            $table->string('kode_ip')->nullable();
            $table->integer('penyedia_id')->unsigned()->nullable();
            $table->integer('pendidikan_id')->unsigned()->nullable();
            $table->integer('sekolah_id')->unsigned()->nullable();
            $table->integer('kategori_id')->unsigned()->nullable();
            $table->integer('keterangan_id')->unsigned()->nullable();
            $table->string('pilihan')->nullable();
            $table->string('tanya')->nullable();
            $table->string('satuan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaan');
    }
}
