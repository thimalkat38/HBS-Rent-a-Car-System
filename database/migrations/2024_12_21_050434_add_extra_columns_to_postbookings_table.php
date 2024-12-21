<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraColumnsToPostbookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postbookings', function (Blueprint $table) {
            $table->decimal('extra_km', 8, 2)->nullable()->after('base_price');
            $table->decimal('extra_hours', 8, 2)->nullable()->after('extra_km');
            $table->decimal('damage_fee', 8, 2)->nullable()->after('extra_hours');
            $table->string('officer')->nullable()->after('vehicle_checked');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postbookings', function (Blueprint $table) {
            $table->dropColumn(['extra_km', 'extra_hours', 'damage_fee', 'officer']);
        });
    }
}
