<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->dateTime('orderedStartTime');
            $table->dateTime('orderedEndTime');
            $table->dateTime('recordedStartTime')->nullable();
            $table->dateTime('recordedEndTime')->nullable();
            $table->dateTime('canceled')->nullable();
            $table->integer('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
