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
        Schema::create('paidowners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id');
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
            $table->string('owner_id');
            $table->string('full_name');
            $table->string('vehicle');
            $table->string('acc_no');
            $table->string('bank_details')->nullable();
            $table->date('date');
            $table->decimal('paid_amnt', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paidowners');
    }
};
