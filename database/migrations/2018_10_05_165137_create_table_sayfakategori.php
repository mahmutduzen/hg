<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSayfakategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sayfakategori', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sayfa_id')->unsigned();;
            $table->integer('kategori_id')->unsigned();;

            $table->foreign('sayfa_id')->references('id')->on('sayfa')->onDelete('cascade');
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
        Schema::dropIfExists('sayfakategori');
    }
}
