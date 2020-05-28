<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInitialTargetToLoanApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_applications', function (Blueprint $table) {
            $table->string('currency')->nullable();
            $table->decimal('lender_initial_target')->nullable();
            $table->decimal('donor_initial_target')->nullable();
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
            $table->string('currency')->nullable();
            $table->decimal('lender_initial_target')->nullable();
            $table->decimal('donor_initial_target')->nullable();
        });
    }
}
