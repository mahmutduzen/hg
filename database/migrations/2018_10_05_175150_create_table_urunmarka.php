<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUrunmarka extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urunmarka', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('urun_id')->unsigned();
            $table->integer('marka_id')->unsigned();

            $table->foreign('urun_id')->references('id')->on('urun')->onDelete('cascade');
            $table->foreign('marka_id')->references('id')->on('marka')->onDelete('cascade');
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
        Schema::dropIfExists('urunmarka');
    }
}
