<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            // Add JSON columns for storing array values
            $table->json('nic_photos')->after('address')->nullable();
            $table->json('dl_photos')->after('nic_photos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            // Remove the JSON columns
            $table->dropColumn(['nic_photos', 'dl_photos']);
        });
    }
};
