<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransfersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('code');
            $table->string('enterprise');
            $table->bigInteger('amount');
            $table->string('currency')->nullable();
            $table->string('grace_period')->default('No');
            $table->date('grace_period_from')->nullable();
            $table->date('grace_period_to')->nullable();
            $table->integer('instalment')->nullable();
            $table->integer('recover_period')->nullable();
            $table->integer('reminder_days')->nullable();
            $table->decimal('rate')->default(0);
            $table->integer('enterprise_id');
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
        Schema::drop('transfers');
    }
}
