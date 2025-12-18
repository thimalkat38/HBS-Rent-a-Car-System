<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ownerpayment', function (Blueprint $table) {
            $table->dropColumn([
                'full_name',
                'owner_id',
                'vehicle',
                'bank_details',
                'acc_no',
                'receipt',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('ownerpayment', function (Blueprint $table) {
            $table->string('full_name')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('bank_details')->nullable();
            $table->string('acc_no')->nullable();
            $table->json('receipt')->nullable();
        });
    }
};
