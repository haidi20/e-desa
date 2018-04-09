<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKinerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kinerja', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('alternatif_id')->unsigned();
          $table->integer('kreteria_id')->unsigned();
          $table->string('jenis')->nullable();
          $table->double('nilai')->default(0);
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
        Schema::dropIfExists('kinerja');
    }
}
