<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembantuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembantu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kreteria_id')->unsigned();
            $table->double('nilai')->default(0);
            // jenis untuk menentukan positif or negatif
            $table->string('jenis')->nullable();
            // format untuk menentukan A or D
            $table->string('format')->nullable();
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
        Schema::dropIfExists('pembantu');
    }
}
