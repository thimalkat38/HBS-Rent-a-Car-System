<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrnItemsTable extends Migration
{
    public function up()
    {
        Schema::create('grn_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grn_id');
            $table->unsignedBigInteger('inventory_id');
            $table->string('item_name');
            $table->integer('quantity');
            $table->decimal('price_per_unit', 10, 2);
            $table->decimal('new_price', 10, 2)->nullable();
            $table->foreign('grn_id')->references('id')->on('grns')->onDelete('cascade');
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grn_items');
    }
}