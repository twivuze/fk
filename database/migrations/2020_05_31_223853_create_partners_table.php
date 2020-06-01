<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Company_or_organization');
            $table->string('Address');
            $table->string('Email');
            $table->string('Country');
            $table->string('Website');
            $table->longText('Why_Do_you_want_to_partner_with_All_Trust_Consult');
            $table->longText('In_which_area_will_the_partnership_focus_on');
            $table->string('Employee_name');
            $table->string('Employee_Contact');
            $table->string('Employee_Email');
            $table->string('Employee_Country');
            $table->string('Upload_Logo_Image');
            $table->boolean('approved');
            $table->integer('session_id');
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
        Schema::drop('partners');
    }
}
