<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LenderCategoryIdToLender extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lender', function (Blueprint $table) {
            //lender_category_id
            $table->integer('lender_category_id')->nullable();
            $table->string('lender_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lender', function (Blueprint $table) {
            //
        });
    }
}
