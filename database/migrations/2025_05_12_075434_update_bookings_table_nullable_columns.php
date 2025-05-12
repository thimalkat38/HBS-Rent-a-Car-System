<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBookingsTableNullableColumns extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->decimal('discount_price', 10, 2)->nullable()->default(null)->change();
            $table->decimal('additional_chagers', 10, 2)->nullable()->default(null)->change();
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Revert to previous state if necessary (example assumes non-nullable with 0 default)
            $table->decimal('discount_price', 10, 2)->default(0)->nullable(false)->change();
            $table->decimal('additional_chagers', 10, 2)->default(0)->nullable(false)->change();
        });
    }
}
