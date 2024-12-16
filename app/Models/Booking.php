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
        'nic',
        'booking_time',
        'arrival_time',
        'price_per_day',
        'days',
        'vehicle_number',
        'fuel_type',
        'vehicle_name',
        'from_date',
        'to_date',
        'discount_price',
        'additional_chagers',
        'payed',
        'price',
        'reason',
        'driving_photos',
        'nic_photos',
        'deposit',        
        'deposit_img',    
        'status',         
    ];

    protected $casts = [
        'driving_photos' => 'array',
        'nic_photos' => 'array',
        'deposit_img' => 'array', 
    ];
}
