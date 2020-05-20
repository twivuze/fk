<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMicrofundApplicationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microfund_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('email');
            $table->string('address');
            $table->string('phone_number');
            $table->string('religion');
            $table->string('marital_status');
            $table->string('gender');
            $table->longText('q1_1');
            $table->longText('q1_2');
            $table->longText('q1_3');
            $table->longText('q1_4');
            $table->longText('q2_1');
            $table->longText('q2_2');
            $table->longText('q2_3');
            $table->longText('q3_1');
            $table->longText('q3_2');
            $table->longText('q3_3');
            $table->longText('q4_1');
            $table->longText('q4_2');
            $table->longText('q4_3');
            $table->longText('q4_4');
            $table->longText('q5_1');
            $table->longText('q5_2');
            $table->string('q5_3');
            
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
        Schema::drop('microfund_applications');
    }
}
