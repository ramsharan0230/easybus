<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('bus_number')->nullable();
            $table->integer('bus_category')->nullable();
            $table->string('bus_name')->nullable();
            $table->string('seat_limit')->nullable();
            $table->string('made_year')->nullable();
            $table->string('manufacturer')->nullable();
            $table->text('facilities')->nullable();
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->string('bus_route')->nullable();
            $table->string('service_type')->nullable();
            $table->integer('assistant_1')->nullable();
            $table->integer('assistant_2')->nullable();
            $table->string('assistant_one_phone')->nullable();
            $table->string('assistant_two_phone')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('row')->nullable();
            $table->string('column')->nullable();
            $table->text('notice')->nullable();
            $table->enum('status',['new','approved','rejected'])->default('new');
            $table->string('boarding_point')->nullable();
            
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
        Schema::dropIfExists('buses');
    }
}
