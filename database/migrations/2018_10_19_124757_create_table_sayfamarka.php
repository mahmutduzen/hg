<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSayfamarka extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sayfamarka', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sayfa_id')->unsigned();;
            $table->integer('marka_id')->unsigned();;

            $table->foreign('sayfa_id')->references('id')->on('sayfa')->onDelete('cascade');
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
        Schema::dropIfExists('sayfamarka');
    }
}
