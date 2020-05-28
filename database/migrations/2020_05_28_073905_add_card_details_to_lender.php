<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCardDetailsToLender extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lender', function (Blueprint $table) {
            $table->bigInteger('card_number')->nullable();
            $table->integer('expiration_year')->nullable();
            $table->integer('expiration_month')->nullable();
            $table->integer('cvc')->nullable();
            $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lender', function (Blueprint $table) {
            $table->bigInteger('card_number')->nullable();
            $table->integer('expiration_year')->nullable();
            $table->integer('expiration_month')->nullable();
            $table->integer('cvc')->nullable();
            $table->integer('user_id')->nullable();
        });
    }
}
