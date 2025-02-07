<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('postbookings', function (Blueprint $table) {
            $table->string('start_km')->nullable()->after('agn'); // Placing start_km after 'agn'
            $table->string('end_km')->nullable()->after('start_km');
            $table->string('free_km')->nullable()->after('end_km');
            $table->string('over')->nullable()->after('free_km');
            $table->string('extra_km_chg')->nullable()->after('over');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('postbookings', function (Blueprint $table) {
            $table->dropColumn(['start_km', 'end_km', 'free_km', 'over', 'extra_km_chg']);
        });
    }
};
