<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleOwner extends Model
{
    use HasFactory;

    protected $table = 'vehicleowners'; 

    protected $fillable = [
        'title',
        'full_name',
        'vehicle_number',
        'vehicle_name',
        'phone',
        'address',
        'start_date',
        'end_date',
        'rental_amnt',
        'monthly_km',
        'extra_km_chg',
        'acc_no',
        'bank_detais',
    ];
}
