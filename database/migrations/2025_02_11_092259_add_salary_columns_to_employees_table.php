<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('salary')->nullable()->after('mobile_number');
            $table->string('advanced_salary')->nullable()->after('salary');
            $table->string('remaining_salary')->nullable()->after('advanced_salary');
        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn(['salary','remaining_salary','advanced_salary']);
        });
    }
};
