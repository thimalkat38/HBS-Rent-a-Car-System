<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_name');
            $table->string('vehicle_type');
            $table->string('vehicle_number');
            $table->string('vehicle_model');
            $table->string('engine_number');
            $table->string('fuel_type');
            $table->string('chassis_number');
            $table->string('model_year');
            $table->json('features')->nullable();  // Stores features like leather seats, air conditioner etc.
            $table->json('images')->nullable();  // Stores image paths
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}