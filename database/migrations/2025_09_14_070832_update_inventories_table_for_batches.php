<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInventoriesTableForBatches extends Migration
{
    public function up()
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->dropColumn(['quantity', 'price_per_unit', 'total_price']); // Remove if not needed
            // Or keep for legacy, but ignore in calculations
        });
    }

    public function down()
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->integer('quantity')->default(0);
            $table->decimal('price_per_unit', 10, 2)->nullable();
            $table->decimal('total_price', 10, 2)->nullable();
        });
    }
}