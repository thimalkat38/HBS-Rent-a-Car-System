<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('current_mileage')->nullable()->after('type');
            $table->string('next_mileage')->nullable()->after('current_mileage');
            $table->date('next_date')->nullable()->after('date');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['current_mileage', 'next_mileage', 'next_date']);
        });
    }
};

