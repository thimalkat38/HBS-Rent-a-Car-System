<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVehicleDetailsToVehicleownersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicleowners', function (Blueprint $table) {
            $table->string('vehicle_number')->nullable()->after('full_name');
            $table->string('vehicle_name')->nullable()->after('vehicle_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicleowners', function (Blueprint $table) {
            $table->dropColumn(['vehicle_number', 'vehicle_name']);
        });
    }
}

