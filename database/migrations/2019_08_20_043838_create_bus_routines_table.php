<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_routines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bus_id')->unsigned();
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('price')->nullable();
            $table->string('shift')->nullable();
            $table->string('time')->nullable();
            $table->text('notice')->nullable();
            $table->text('sms')->nullable();
            $table->string('boarding_point')->nullable();
            $table->string('date')->nullable();
            $table->boolean('publish')->nullable();
            

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
        Schema::dropIfExists('bus_routines');
    }
}
