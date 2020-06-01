<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConferenceApplicationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('contact');
            $table->date('date_of_birth');
            $table->longText('How_did_you_know_Yes_Conference')->nullable();
            $table->string('Have_you_previously_attended_any_Yes_Conference')->nullable();
            $table->longText('If_ye_describe_the_year')->nullable();
            $table->string('How_do_you_prefer_to_attend_the_coming_YES_conference')->nullable();
            $table->string('Are_you_willing_to_obtain_a_participation_Certificate')->nullable();
            $table->longText('Can_you_describe_why_youth_think_Africas_youth_should_engage')->nullable();
            $table->longText('Why_are_you_interested_in_YES_AWARD_competition')->nullable();
            $table->string('Project_name')->nullable();
            $table->longText('What_is_it_about')->nullable();
            $table->string('What_is_the_status_of_your_project')->nullable();
            $table->string('Are_you_willing_to_apply_for_your_project_loan')->nullable();
            $table->string('If_yes_mention_the_range_of_the_loan_amount')->nullable();;
            $table->string('Upload_your_business_project_plan')->nullable();;
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
        Schema::drop('conference_applications');
    }
}
