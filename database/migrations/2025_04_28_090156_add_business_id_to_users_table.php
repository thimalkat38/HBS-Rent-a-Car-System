<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the business_id column
            $table->unsignedBigInteger('business_id')->after('id'); // Add after 'id' or any column you prefer
    
            // Add foreign key constraint
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
        });
    }
    
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['business_id']);
            // Drop the business_id column
            $table->dropColumn('business_id');
        });
    }
};
