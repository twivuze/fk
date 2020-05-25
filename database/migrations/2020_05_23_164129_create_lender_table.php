<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLenderTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('contact');
            $table->string('country');
            $table->string('Occupation');
            $table->longText('which_business_you_are_willing_to_lend_to');
            $table->longText('why_did_you_choose_such_business');
            $table->string('recurring');
            $table->string('lenders_bank_details');
            $table->string('lenders_passport_photo');
            $table->string('lenders_copy_of_identity_card_or_passport');
            $table->integer('session_id')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive');
            $table->string('email');
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
        Schema::drop('lender');
    }
}
