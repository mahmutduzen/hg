<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adi');
            $table->integer('kullanici_id')->unsigned();
            $table->integer('telefonbir');
            $table->integer('telefoniki')->nullable();
            $table->string('ulke');
            $table->string('sehir');
            $table->string('ilce');
            $table->text('detay');
            $table->integer('postakodu');

            $table->foreign('kullanici_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('adres');
    }
}
