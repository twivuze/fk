<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToTrainingWorkshopSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('training_workshop_sessions', function (Blueprint $table) {
            $table->date('event_date')->nullable();
            $table->string('event_time')->nullable();
            $table->string('event_location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_workshop_session', function (Blueprint $table) {
            //
        });
    }
}
