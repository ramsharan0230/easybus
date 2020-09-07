<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('category')->nullable();
            $table->string('publish')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('citizen_no')->nullable();
            $table->string('passport_image')->nullable();
            $table->string('driving_front')->nullable();
            $table->string('driving_back')->nullable();
            $table->string('image')->nullable();
            $table->string('citizen_front')->nullable();
            $table->string('citizen_back')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('pan')->nullable();
            $table->string('pan_image')->nullable();
            $table->string('company_image')->nullable();
            $table->string('password');
            $table->tinyInteger('main')->default(0);
            $table->string('company_reg_no')->nullable();
            $table->string('role')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
