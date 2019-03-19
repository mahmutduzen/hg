<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableYorum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yorum', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kullanici_id')->unsigned();
            $table->text('metin');
            $table->date('tarih');
            $table->integer('yazi_id')->unsigned()->nullable();

            $table->foreign('kullanici_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('yazi_id')->references('id')->on('yazi')->onDelete('cascade');

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
        Schema::dropIfExists('yorum');
    }
}
