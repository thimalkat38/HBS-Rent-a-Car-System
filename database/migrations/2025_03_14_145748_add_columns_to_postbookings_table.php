<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('postbookings', function (Blueprint $table) {
            $table->date('ar_date')->nullable()->after('to_date');
            $table->string('price_per_day')->nullable()->after('ar_date');
            $table->string('ex_date')->nullable()->after('price_per_day');
        });
    }

    public function down()
    {
        Schema::table('postbookings', function (Blueprint $table) {
            $table->dropColumn(['price_per_day', 'ex_date', 'ar_date']);
        });
    }
};
