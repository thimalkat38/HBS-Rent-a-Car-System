<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->date('license_exp_date')->nullable()->after('model_year');
            $table->date('insurance_exp_date')->nullable()->after('license_exp_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn(['license_exp_date', 'insurance_exp_date']);
        });
    }
};
