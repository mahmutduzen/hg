<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableresKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resKategori', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adi');
            $table->integer('dosya_id')->unsigned();
            
            $table->foreign('dosya_id')->references('id')->on('dosya')->onDelete('cascade');

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
        Schema::dropIfExists('resKategori');
    }
}
