<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableYazikategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yazikategori', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('yazi_id')->unsigned();;
            $table->integer('kategori_id')->unsigned();;

            $table->foreign('yazi_id')->references('id')->on('yazi')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
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
        Schema::dropIfExists('yazikategori');
    }
}
