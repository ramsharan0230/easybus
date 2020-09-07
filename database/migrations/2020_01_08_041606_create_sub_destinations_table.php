<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_destinations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('busroutine_id')->unsigned();
            $table->foreign('busroutine_id')->references('id')->on('bus_routines')->onDelete('cascade');
            $table->string('sub_destination');
            $table->string('sub_price');
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
        Schema::dropIfExists('sub_destinations');
    }
}
