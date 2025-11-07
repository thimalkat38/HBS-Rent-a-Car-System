<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'title',
        'full_name',
        'mobile_number',
        'nic',
        'address',
        'booking_time',
        'arrival_time',
        'price_per_day',
        'officer',
        'commission',
        'commission_amt',
        'commission2',
        'commission_amt2',
        'driver_name',
        'location',
        'driver_commission_amt',
        'hand_over_booking',
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
        'method',
        'driving_photos',
        'nic_photos',
        'deposit',
        'deposit_img',
        'status',
        'guarantor',
        'extra_km_chg',
        'free_km',
        'free_kmd',
        'start_km'
    ];

    protected $casts = [
        'driving_photos' => 'array',
        'nic_photos' => 'array',
        'deposit_img' => 'array',
        'grnt_nic' => 'array',
        'hand_over_booking' => 'boolean',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
