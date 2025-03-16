<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('vehicleowners', function (Blueprint $table) {
            $table->decimal('rem_rental', 10, 2)->default(0);
        });
    }

    public function down()
    {
        Schema::table('vehicleowners', function (Blueprint $table) {
            $table->dropColumn('rem_rental');
        });
    }
};

