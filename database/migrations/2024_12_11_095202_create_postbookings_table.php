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
        Schema::create('postbookings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('nic')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->string('vehicle')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('base_price')->nullable();
            $table->string('after_additional')->nullable();
            $table->string('reason')->nullable();
            $table->string('after_discount')->nullable();
            $table->string('paid')->nullable();
            $table->string('due')->nullable();
            $table->string('total_income')->nullable();
            $table->boolean('due_paid')->default(false); 
            $table->boolean('deposit_refunded')->default(false); 
            $table->boolean('vehicle_checked')->default(false); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postbookings');
    }
};
