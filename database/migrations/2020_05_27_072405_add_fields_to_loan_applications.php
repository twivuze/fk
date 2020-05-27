<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToLoanApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_applications', function (Blueprint $table) {
            $table->string('short_summary')->nullable();
            $table->longText('description')->nullable();
            $table->string('business_model_file')->nullable();
            $table->integer('business_category_id')->nullable();
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
        Schema::table('loan_applications', function (Blueprint $table) {
            $table->string('short_summary')->nullable();
            $table->longText('description')->nullable();
            $table->string('business_model_file')->nullable();
            $table->integer('business_category_id')->nullable();
            $table->integer('user_id')->nullable();
        });
    }
}
