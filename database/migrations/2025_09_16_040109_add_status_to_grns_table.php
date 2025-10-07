<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToGrnsTable extends Migration
{
    public function up()
    {
        Schema::table('grns', function (Blueprint $table) {
            $table->enum('status', ['due', 'partial', 'paid'])->default('due')->after('paid_value');
        });
    }

    public function down()
    {
        Schema::table('grns', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}