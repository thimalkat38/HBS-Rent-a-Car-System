<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Commission fields
            $table->decimal('commission_amt', 10, 2)->nullable()->after('commission');
            $table->string('commission2')->nullable()->after('commission_amt');
            $table->decimal('commission_amt2', 10, 2)->nullable()->after('commission2');

            // Driver fields
            $table->string('driver_name')->nullable()->after('commission_amt2');
            $table->decimal('driver_commission_amt', 10, 2)->nullable()->after('driver_name');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['commission_amt', 'commission2', 'commission_amt2', 'driver_name', 'driver_commission_amt']);
        });
    }
};


