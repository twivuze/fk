<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DonorCategoryIdToDonor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donors', function (Blueprint $table) {
            $table->integer('donor_category_id')->nullable();
            $table->string('donor_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donors', function (Blueprint $table) {
            //
        });
    }
}
