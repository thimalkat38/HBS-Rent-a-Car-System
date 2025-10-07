<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrnsTable extends Migration
{
    public function up()
    {
        Schema::create('grns', function (Blueprint $table) {
            $table->id();
            $table->string('grn_id')->unique(); // e.g., GRN001
            $table->string('supplier_name');
            $table->date('date');
            $table->string('reference_no')->nullable();
            $table->decimal('total_grn_value', 10, 2);
            $table->decimal('paid_value', 10, 2)->default(0);
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('business_id');
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grns');
    }
}