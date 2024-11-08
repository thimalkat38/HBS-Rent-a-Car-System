<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Mr, Mrs, etc.
            $table->string('full_name');
            $table->string('mobile_number');
            $table->time('booking_time');
            $table->string('vehicle_number');
            $table->string('fuel_type');
            $table->string('vehicle_name');
            $table->date('from_date');
            $table->date('to_date');
            $table->json('driving_photos')->nullable();
            $table->json('nic_photos')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
