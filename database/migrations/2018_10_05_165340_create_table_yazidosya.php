<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableYazidosya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yazidosya', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('yazi_id')->unsigned();;
            $table->integer('dosya_id')->unsigned();;

            $table->foreign('yazi_id')->references('id')->on('yazi')->onDelete('cascade');
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
        Schema::dropIfExists('yazidosya');
    }
}
