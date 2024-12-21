<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsInTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update columns in the bookings table
        Schema::table('bookings', function (Blueprint $table) {
            $table->decimal('discount_price', 10, 2)->change();
            $table->decimal('additional_chagers', 10, 2)->change();
            $table->decimal('price', 10, 2)->change();
            $table->integer('days')->change();
        });

        // Update columns in the payrolls table
        Schema::table('payrolls', function (Blueprint $table) {
            $table->decimal('paid_amnt', 10, 2)->change();
        });

        // Update columns in the postbookings table
        Schema::table('postbookings', function (Blueprint $table) {
            $table->decimal('base_price', 10, 2)->change();
            $table->decimal('after_additional', 10, 2)->change();
            $table->decimal('after_discount', 10, 2)->change();
            $table->decimal('due', 10, 2)->change();
        });

        // Update columns in the vehicles table
        Schema::table('vehicles', function (Blueprint $table) {
            $table->decimal('price_per_day', 10, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert changes in the bookings table
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('discount_price')->change();
            $table->integer('additional_chagers')->change();
            $table->integer('price')->change();
            $table->decimal('days', 10, 2)->change();
        });

        // Revert changes in the payrolls table
        Schema::table('payrolls', function (Blueprint $table) {
            $table->integer('paid_amnt')->change();
        });

        // Revert changes in the postbookings table
        Schema::table('postbookings', function (Blueprint $table) {
            $table->integer('base_price')->change();
            $table->integer('after_additional')->change();
            $table->integer('after_discount')->change();
            $table->integer('due')->change();
        });

        // Revert changes in the vehicles table
        Schema::table('vehicles', function (Blueprint $table) {
            $table->integer('price_per_day')->change();
        });
    }
}
