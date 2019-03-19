<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSayfa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sayfa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('baslik');
            $table->text('metin');
            $table->integer('tip_id')->unsigned();;
            $table->integer('sitil_id')->unsigned();;
            $table->string('video')->nullable();

            $table->foreign('tip_id')->references('id')->on('tip')->onDelete('cascade');
            $table->foreign('sitil_id')->references('id')->on('sitil')->onDelete('cascade');

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
        Schema::dropIfExists('sayfa');
    }
}
