<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSayfaetiket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sayfaetiket', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sayfa_id')->unsigned();;
            $table->integer('etiket_id')->unsigned();;

            $table->foreign('sayfa_id')->references('id')->on('sayfa')->onDelete('cascade');
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
        Schema::dropIfExists('sayfaetiket');
    }
}
