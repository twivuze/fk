<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            \DB::statement("ALTER TABLE `users` CHANGE `type` `type` ENUM('Admin', 'MicroFoundManager', 'Enterprise','Lender','Donor','Center');");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            \DB::statement("ALTER TABLE `users` CHANGE `type` `type` ENUM('Admin', 'MicroFoundManager', 'Enterprise','Lender','Donor','Center');");

        });
    }
}
