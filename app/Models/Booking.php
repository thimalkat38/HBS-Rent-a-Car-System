<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'full_name',
        'mobile_number',
        'booking_time',
        'vehicle_number',
        'fuel_type',
        'vehicle_name',
        'from_date',
        'to_date',
        'price',
        'driving_photos',
        'nic_photos',
    ];

    protected $casts = [
        'driving_photos' => 'array',
        'nic_photos' => 'array',
    ];
}
