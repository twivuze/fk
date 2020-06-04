<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLoanApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_applications', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
            $table->string('national_identity_copy')->nullable()->change();
            $table->string('business_certificate')->nullable()->change();

            $table->string('business_patent')->nullable()->change();
            $table->string('formal_reference_name')->nullable()->change();
            $table->string('any_recent_transactions_documents')->nullable()->change();

            $table->string('formal_reference_phone')->nullable()->change();
            $table->string('formal_reference_email')->nullable()->change();
            $table->string('alternative_contact_name')->nullable()->change();

            $table->string('alternative_contact_email')->nullable()->change();
            $table->string('alternative_contact_phone')->nullable()->change();
            $table->string('alternative_contact_id_number')->nullable()->change();

            $table->string('national_identity_number')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
