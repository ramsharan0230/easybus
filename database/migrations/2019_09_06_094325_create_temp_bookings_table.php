<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token')->nullable();
            $table->integer('bus_id')->nullable();
            $table->integer('seat_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('vendor_id')->nullable();
             $table->integer('routine_id')->nullable();
            $table->bigInteger('book_no')->nullable();
            $table->string('booked_on')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('pickup_station')->nullable();
            $table->string('drop_station')->nullable();
            $table->string('sub_destination')->nullable();
            $table->string('from')->nullable();
            $table->string('price')->nullable();
            $table->string('time')->nullable();
            $table->string('to')->nullable();
            $table->string('shift')->nullable();
            $table->string('date');
            $table->boolean('paid')->default(0);
            $table->boolean('online_payment')->default(0);

            $table->string('booked')->nullable();
            $table->index('token');
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
        Schema::dropIfExists('temp_bookings');
    }
}
