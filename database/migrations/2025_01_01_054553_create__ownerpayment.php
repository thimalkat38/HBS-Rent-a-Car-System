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
        Schema::create('ownerpayment', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('date')->nullable();
            $table->string('paid_amnt')->nullable();
            $table->string('bank_details')->nullable();
            $table->string('acc_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ownerpayment');
    }
};
