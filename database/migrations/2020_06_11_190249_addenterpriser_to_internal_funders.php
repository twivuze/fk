<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddenterpriserToInternalFunders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internal_funders', function (Blueprint $table) {
            $table->string('code');
            $table->string('enterprise');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internal_funders', function (Blueprint $table) {
            $table->string('code');
            $table->string('enterprise');
        });
    }
}
