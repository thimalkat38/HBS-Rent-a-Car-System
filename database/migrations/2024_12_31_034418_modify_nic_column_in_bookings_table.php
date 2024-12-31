<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('nic'); // Drop the existing 'nic' column
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->string('nic')->nullable()->after('mobile_number'); // Re-add 'nic' as a nullable string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('nic'); // Drop the modified column
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->decimal('nic', 8, 2)->nullable(false)->after('mobile_number'); // Revert to the original column definition
        });
    }
};
