<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no')->nullable();
            $table->string('cat')->nullable();
            $table->date('date');
            $table->string('for_emp')->nullable();
            $table->string('for_cus')->nullable();
            $table->string('fuel_for')->nullable();
            $table->text('docs')->nullable();
            $table->string('amnt')->nullable();
            $table->string('note')->nullable();
            $table->timestamps(); // Adds created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
