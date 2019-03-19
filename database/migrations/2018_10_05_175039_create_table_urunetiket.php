<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUrunetiket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urunetiket', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('urun_id')->unsigned();
            $table->integer('etiket_id')->unsigned();

            $table->foreign('urun_id')->references('id')->on('urun')->onDelete('cascade');
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
        Schema::dropIfExists('urunetiket');
    }
}
