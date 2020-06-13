<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepaymentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repayments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loan_id');
            $table->integer('enterprise_id');
            $table->string('repay_code');
            $table->enum('status',['current','pending','successful','outstanding'])->default('current');
            $table->string('currency')->nullable();
            $table->string('repayer')->nullable();
            $table->date('repay_date')->nullable();
            $table->date('next_repay_date')->nullable();
            $table->decimal('interest_amount',15, 8)->default(0.0);
            $table->decimal('amount_without_interst',15, 8)->default(0.0);
            $table->decimal('total_amount',15, 8)->default(0.0);
            $table->integer('repay_reminder_day')->nullable();
            $table->integer('center_id')->nullable();
            $table->boolean('did_repay')->default(false);
            $table->decimal('total_loan_remain_amount')->default(0.0);
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
        Schema::drop('repayments');
    }
}
