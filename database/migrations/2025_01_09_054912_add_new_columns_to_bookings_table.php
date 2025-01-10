<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('guarantor')->nullable()->after('method');
            $table->string('extra_km_chg')->nullable()->after('guarantor');
            $table->string('free_km')->nullable()->after('extra_km_chg');
            $table->string('start_km')->nullable()->after('free_km');
            $table->json('grnt_nic')->nullable()->after('deposit_img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['guarantor', 'extra_km_chg', 'free_km', 'start_km', 'grnt_nic']);
        });
    }
}
