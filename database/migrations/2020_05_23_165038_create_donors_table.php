<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('contact');
            $table->string('Occupation');
            $table->longText('which_business_models_are_you_willing_to_donate_to');
            $table->longText('why_did_you_choose_such_business');
            $table->string('requiring');
            $table->string('donors_bank_details');
            $table->string('donors_passport_photo');
            $table->string('donors_copy_of_identity_card_or_passport');
            $table->integer('session_id')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive');
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
        Schema::drop('donors');
    }
}
