<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationInvoicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('donor_id');
            $table->integer('enterprise_id');
            $table->string('donor')->nullable();
            $table->string('enterprise')->nullable();
            $table->decimal('amount');
            $table->integer('center_id')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('receipt_id')->nullable();
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
        Schema::drop('donation_invoices');
    }
}
