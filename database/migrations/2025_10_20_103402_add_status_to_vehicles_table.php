<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            // Tiny int is enough; put it near other operational fields
            $table->unsignedTinyInteger('status')
                ->default(0)
                ->after('insurance_exp_date'); // move if you prefer a different position
        });

        // Backfill any nulls defensively (some DBs set default only for new rows)
        DB::table('vehicles')->whereNull('status')->update(['status' => 0]);
    }

    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
