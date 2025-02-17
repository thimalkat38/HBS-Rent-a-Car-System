<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('vehicleowners', function (Blueprint $table) {
            $table->string('owner_id')->unique()->after('id');
        });
    }

    public function down()
    {
        Schema::table('vehicleowners', function (Blueprint $table) {
            $table->dropColumn('owner_id');
        });
    }
};
