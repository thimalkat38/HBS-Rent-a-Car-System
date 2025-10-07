<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['name', 'business_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
};