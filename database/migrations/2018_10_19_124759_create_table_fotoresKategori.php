<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFotoResKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotoResKategori', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fotograf_id')->unsigned();;
            $table->integer('resKategori_id')->unsigned();;

            $table->foreign('fotograf_id')->references('id')->on('fotograf')->onDelete('cascade');
            $table->foreign('resKategori_id')->references('id')->on('resKategori')->onDelete('cascade');
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
        Schema::dropIfExists('fotoResKategori');
    }
}
