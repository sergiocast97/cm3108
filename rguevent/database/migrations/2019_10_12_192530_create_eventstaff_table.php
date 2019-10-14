<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventstaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventstaff', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('event_id');
            $table->string('user_role');
            $table->timestamps();
            $table->primary(array('user_id','event_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventstaff');
    }
}
