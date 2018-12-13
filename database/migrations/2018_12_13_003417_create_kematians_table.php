<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKematiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kematian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penduduk_id')->unsigned();
            $table->date('tanggal')->nullable();
            $table->string('alasan')->nullable();
            $table->string('tempat')->nullable();
            $table->string('file')->nullable();
            $table->integer('persetujuan')->default(0);
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
        Schema::dropIfExists('kematian');
    }
}
