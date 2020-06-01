<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBusinessNameToLoanApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_applications', function (Blueprint $table) {
            $table->string('business_name')->nullable();
            $table->longText('fundraising_message')->nullable();
            $table->decimal('budget')->nullable();
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
            $table->string('business_name')->nullable();
            $table->longText('fundraising_message')->nullable();
            $table->decimal('budget')->nullable();
        });
    }
}
