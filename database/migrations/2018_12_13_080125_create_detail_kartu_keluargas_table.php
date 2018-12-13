<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailKartuKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kartu_keluarga', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kartukeluarga_id')->unsigned();
            $table->integer('penduduk_id')->unsigned();
            $table->string('role')->nullable(); 
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
        Schema::dropIfExists('detail_kartu_keluargas');
    }
}
