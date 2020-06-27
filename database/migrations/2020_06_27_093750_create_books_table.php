<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('title');
            $table->string('author')->nullable();
            $table->string('edition')->nullable();
            $table->string('publisher')->nullable();
            $table->string('ISBN')->nullable();
            $table->string('Length')->nullable();
            $table->longText('Subjects')->nullable();
            $table->string('cover')->nullable();
            $table->string('payment_type')->default('Free');
            $table->decimal('price',15,6)->default(0.00);
            $table->longText('description')->nullable();
            $table->boolean('published')->default(false);
            $table->boolean('enable_preview')->default(false);
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
        Schema::drop('books');
    }
}
