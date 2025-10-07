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
        Schema::create('issued_items', function (Blueprint $table) {
            $table->id();
            $table->string('issue_id');
            $table->unsignedBigInteger('inventory_id');
            $table->string('item_name');
            $table->integer('quantity_issued');
            $table->decimal('price_per_unit', 10, 2);
            $table->decimal('total_value', 10, 2);
            $table->date('issue_date');
            $table->enum('issue_type', ['vehicle', 'employee', 'both']);
            
            // Vehicle related fields
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->string('vehicle_number')->nullable();
            
            // Employee related fields
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('employee_nic')->nullable();
            $table->string('employee_name')->nullable();
            
            $table->text('notes')->nullable();
            $table->enum('status', ['issued', 'returned', 'partially_returned', 'lost', 'damaged'])->default('issued');
            $table->unsignedBigInteger('issued_by');
            $table->unsignedBigInteger('business_id');
            
            // Return related fields
            $table->timestamp('returned_at')->nullable();
            $table->text('return_notes')->nullable();
            $table->integer('return_quantity')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index(['business_id', 'status']);
            $table->index(['business_id', 'issue_date']);
            $table->index('issue_id');
            $table->index(['vehicle_id', 'status']);
            $table->index(['employee_id', 'status']);
            $table->index(['inventory_id', 'status']);
            
            // Foreign key constraints
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('set null');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('set null');
            $table->foreign('issued_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issued_items');
    }
};