<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoanApplicationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('country');
            $table->string('region');
            $table->string('national_identity_number');
            $table->string('contact');
            $table->string('religion');
            $table->string('marital_status');
            $table->string('status');
            $table->string('business_location_or_address');
            $table->string('year_of_start_up');
            $table->string('your_business_working_days');
            $table->string('expected_average_customers_per_week');
            $table->string('loan_size');
            $table->longText('why_this_loan_size');
            $table->longText('what_makes_you_eligible_for_the_loan');
            $table->longText('can_make_loan_repayment_on_time');
            $table->longText('what_makes_you_move_on_in_life');
            $table->longText('what_is_your_ultimate_goal_in_life');
            $table->longText('what_is_integrity_to_you');
            $table->string('additional_q1');
            $table->string('additional_q2');
            $table->string('additional_q3');
            $table->string('additional_q4');
            $table->string('upload_passport_photo');
            $table->string('national_identity_copy');
            $table->string('business_certificate');
            $table->string('business_patent');
            $table->string('any_recent_transactions_documents');
            $table->string('formal_reference_name');
            $table->string('formal_reference_phone');
            $table->string('formal_reference_email');
            $table->string('alternative_contact_name');
            $table->string('alternative_contact_email');
            $table->string('alternative_contact_phone');
            $table->string('alternative_contact_id_number');
            $table->integer('microfinance_center')->nullable();
            $table->integer('session_id')->nullable();
            $table->enum('category', ['Enterprises-Awaiting-Funding', 'Diaspora-Funded-Enterprises','Fully-Funded-Enterprises'])->default('Enterprises-Awaiting-Funding');
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
        Schema::drop('loan_applications');
    }
}
