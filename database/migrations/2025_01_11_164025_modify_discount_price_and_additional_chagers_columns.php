<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDiscountPriceAndAdditionalChagersColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Change the columns to DECIMAL(10, 2) with default value 0.00
            $table->decimal('discount_price', 10, 2)->default(0.00)->change();
            $table->decimal('additional_chagers', 10, 2)->default(0.00)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Revert the columns back to integer
            $table->integer('discount_price')->default(0)->change();
            $table->integer('additional_chagers')->default(0)->change();
        });
    }
}