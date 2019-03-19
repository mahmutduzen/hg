<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableYazietiket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yazietiket', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('yazi_id')->unsigned();;
            $table->integer('etiket_id')->unsigned();;

            $table->foreign('yazi_id')->references('id')->on('yazi')->onDelete('cascade');
            $table->foreign('etiket_id')->references('id')->on('etiket')->onDelete('cascade');
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
        Schema::dropIfExists('yazietiket');
    }
}
