<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInfodetay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infodetay', function (Blueprint $table) {
            $table->increments('id');
            $table->string('baslik');
            $table->text('ozellik');
            $table->integer('info_id')->unsigned();

            $table->foreign('info_id')->references('id')->on('info')->onDelete('cascade');

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
        Schema::dropIfExists('infodetay');
    }
}
