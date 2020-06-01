<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFillingDocumentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filling_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('file_name');
            $table->integer('filling_category_id')->nullable();
            $table->integer('center_id')->nullable();
            $table->integer('microfund_manager_id')->nullable();
            $table->string('filling_category')->nullable();
            $table->string('country')->nullable();
            $table->boolean('published');
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
        Schema::drop('filling_documents');
    }
}
