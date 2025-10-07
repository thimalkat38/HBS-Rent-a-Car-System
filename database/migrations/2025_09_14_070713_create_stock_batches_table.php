<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockBatchesTable extends Migration
{
    public function up()
    {
        Schema::create('stock_batches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_id'); // Link to inventory item
            $table->string('batch_id')->unique(); // e.g., BATCH001
            $table->integer('quantity'); // Batch quantity
            $table->decimal('unit_price', 10, 2); // Price for this batch
            $table->decimal('batch_value', 10, 2); // quantity * unit_price
            $table->unsignedBigInteger('grn_id')->nullable(); // Link to GRN if applicable
            $table->timestamps();

            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade');
            $table->foreign('grn_id')->references('id')->on('grns')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_batches');
    }
}