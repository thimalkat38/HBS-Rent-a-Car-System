<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrnPaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('grn_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grn_id');
            $table->decimal('payment_amount', 10, 2);
            $table->text('notes')->nullable();
            $table->timestamp('payment_date');
            $table->unsignedBigInteger('paid_by'); // user who made the payment
            $table->timestamps();

            $table->foreign('grn_id')->references('id')->on('grns')->onDelete('cascade');
            $table->foreign('paid_by')->references('id')->on('users')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('grn_payments');
    }
}