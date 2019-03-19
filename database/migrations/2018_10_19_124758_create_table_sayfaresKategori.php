<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSayfaResKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sayfaResKategori', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sayfa_id')->unsigned();;
            $table->integer('resKategori_id')->unsigned();;

            $table->foreign('sayfa_id')->references('id')->on('sayfa')->onDelete('cascade');
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
        Schema::dropIfExists('sayfaResKategori');
    }
}