<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrainingWorkshopsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_workshops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('country');
            $table->string('email');
            $table->string('project_or_business_name')->nullable();;
            $table->longText('What_is_your_project_or_business_about')->nullable();;
            $table->string('Business_location')->nullable();;
            $table->longText('What_is_your_expectations_to_this_Training')->nullable();;
            $table->string('Are_you_willing_to_obtain_a_participation_Certificate')->nullable();;
            $table->integer('session_id');
            $table->boolean('approved')->default(false);
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
        Schema::drop('training_workshops');
    }
}
