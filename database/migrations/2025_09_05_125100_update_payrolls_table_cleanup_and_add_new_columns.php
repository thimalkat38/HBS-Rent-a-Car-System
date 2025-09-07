<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('payrolls', function (Blueprint $table) {
            // Drop old/unused columns if they exist
            if (Schema::hasColumn('payrolls', 'acc_num')) {
                $table->dropColumn('acc_num');
            }
            if (Schema::hasColumn('payrolls', 'note')) {
                $table->dropColumn('note');
            }
            if (Schema::hasColumn('payrolls', 'paid_amnt')) {
                $table->dropColumn('paid_amnt');
            }

            // Add new columns
            if (!Schema::hasColumn('payrolls', 'month')) {
                $table->string('month')->after('emp_id');
            }

            if (!Schema::hasColumn('payrolls', 'leaves')) {
                $table->integer('leaves')->default(0)->after('month');
            }

            if (!Schema::hasColumn('payrolls', 'basic')) {
                $table->decimal('basic', 10, 2)->after('leaves');
            }

            if (!Schema::hasColumn('payrolls', 'earnings')) {
                $table->json('earnings')->nullable()->after('basic');
            }

            if (!Schema::hasColumn('payrolls', 'deductions')) {
                $table->json('deductions')->nullable()->after('earnings');
            }
            if (!Schema::hasColumn('payrolls', 'gross')) {
                $table->string('gross')->after('earnings');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payrolls', function (Blueprint $table) {
            // Restore old columns
            if (!Schema::hasColumn('payrolls', 'acc_num')) {
                $table->string('acc_num')->nullable();
            }
            if (!Schema::hasColumn('payrolls', 'note')) {
                $table->text('note')->nullable();
            }
            if (!Schema::hasColumn('payrolls', 'paid_amnt')) {
                $table->decimal('paid_amnt', 10, 2)->nullable();
            }

            // Drop new columns
            if (Schema::hasColumn('payrolls', 'month')) {
                $table->dropColumn('month');
            }
            if (Schema::hasColumn('payrolls', 'leaves')) {
                $table->dropColumn('leaves');
            }
            if (Schema::hasColumn('payrolls', 'basic')) {
                $table->dropColumn('basic');
            }
            if (Schema::hasColumn('payrolls', 'earnings')) {
                $table->dropColumn('earnings');
            }
            if (Schema::hasColumn('payrolls', 'deductions')) {
                $table->dropColumn('deductions');
            }
            if (Schema::hasColumn('payrolls', 'gross')) {
                $table->dropColumn('gross');
            }
        });
    }
};
