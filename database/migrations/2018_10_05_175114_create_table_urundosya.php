<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUrundosya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urundosya', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('urun_id')->unsigned();
            $table->integer('dosya_id')->unsigned();

            $table->foreign('urun_id')->references('id')->on('urun')->onDelete('cascade');
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
        Schema::dropIfExists('urundosya');
    }
}
