<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\VehicleOwner;
use Illuminate\Support\Facades\DB;

class ResetRemRental extends Command
{
    protected $signature = 'rental:reset';
    protected $description = 'Reset remaining rental amount to default at the end of the month';

    public function handle()
    {
        VehicleOwner::query()->update(['rem_rental' => DB::raw('rental_amnt')]);
        $this->info('Remaining rental amount has been reset for all vehicle owners.');
    }
}


