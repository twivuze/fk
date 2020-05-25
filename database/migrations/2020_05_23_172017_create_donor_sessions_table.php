<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonorSessionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('contents');
            $table->string('image');
            $table->boolean('allow_to_apply');
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
        Schema::drop('donor_sessions');
    }
}
