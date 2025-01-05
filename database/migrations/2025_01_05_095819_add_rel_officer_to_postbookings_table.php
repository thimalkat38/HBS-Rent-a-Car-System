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
            $table->string('rel_officer')->nullable()->after('officer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('postbookings', function (Blueprint $table) {
            $table->dropColumn(['rel_officer']);
        });
    }
};
