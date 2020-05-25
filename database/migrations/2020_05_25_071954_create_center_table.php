<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCenterTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('country');
            $table->string('region');
            $table->string('occupation');
            $table->string('organization');
            $table->longText('q1');
            $table->longText('q2');
            $table->longText('q3');
            $table->longText('q4');
            $table->longText('q5');
            $table->longText('q6');
            $table->longText('q7');
            $table->string('passport_size_photos_zipped');
            $table->string('copies_national_identity_card_zipped');
            $table->string('application_letter_written_by_applicant_pdf');
            $table->string('cover_image')->nullable();
            $table->longText('short_summary')->nullable();
            $table->longText('description')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive');
            $table->integer('session_id')->nullable();
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
        Schema::drop('center');
    }
}
