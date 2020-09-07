<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_payment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->integer('counter_id')->nullable();
            $table->string('date')->nullable();
            $table->integer('price')->nullable();
            $table->boolean('payment_status')->default(0);
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
        Schema::dropIfExists('booking_payment_details');
    }
}
