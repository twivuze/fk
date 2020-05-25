<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoanSessionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('contents');
            $table->string('image');
            $table->boolean('allow_application');
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
        Schema::drop('loan_sessions');
    }
}
