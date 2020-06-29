<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingRequestTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('address');
            $table->string('street_address');
            $table->string('phone_number');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('company_or_Initiative');
            $table->string('title');
            $table->string('function');
            $table->longText('q1');
            $table->longText('q2');
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
        Schema::drop('booking_request');
    }
}
