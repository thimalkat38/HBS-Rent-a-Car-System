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
        Schema::table('postbookings', function (Blueprint $table) {
            $table->string('drived')->nullable()->after('end_km'); // change 'id' if you want another position
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('postbookings', function (Blueprint $table) {
            $table->dropColumn('drived');
        });
    }
};
