<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixGrnsTableAddSupplierIdDropSupplierName extends Migration
{
    public function up()
    {
        Schema::table('grns', function (Blueprint $table) {
            // Add supplier_id if it doesn't exist
            if (!Schema::hasColumn('grns', 'supplier_id')) {
                $table->unsignedBigInteger('supplier_id')->nullable()->after('grn_id');
                $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('set null');
            }

            // Drop supplier_name if it exists
            if (Schema::hasColumn('grns', 'supplier_name')) {
                $table->dropColumn('supplier_name');
            }
        });
    }

    public function down()
    {
        Schema::table('grns', function (Blueprint $table) {
            // Restore supplier_name
            if (!Schema::hasColumn('grns', 'supplier_name')) {
                $table->string('supplier_name')->nullable()->after('grn_id');
            }

            // Drop supplier_id and its foreign key
            if (Schema::hasColumn('grns', 'supplier_id')) {
                $table->dropForeign(['supplier_id']);
                $table->dropColumn('supplier_id');
            }
        });
    }
}