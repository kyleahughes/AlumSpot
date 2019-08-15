<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRSVPEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_s_v_p_events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('users_id');
            $table->integer('programs_id');
            $table->integer('events_id');
            $table->integer('alumnis_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_s_v_p_events');
    }
}
