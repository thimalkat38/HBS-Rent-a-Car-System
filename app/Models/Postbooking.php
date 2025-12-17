<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostBooking extends Model
{
    use HasFactory;

    protected $table = 'postbookings';

    protected $fillable = [
        'booking_id',
        'business_id',
        'full_name',
        'nic',
        'mobile_number',
        'vehicle_number',
        'vehicle',
        'from_date',
        'to_date',
        'ar_date',
        'price_per_day',
        'ex_date',
        'base_price',
        'extra_km',
        'extra_hours',
        'damage_fee',
        'after_additional',
        'reason',
        'after_discount',
        'paid',
        'due',
        'total_income',
        'due_paid',
        'deposit_refunded',
        'vehicle_checked',
        'officer',
        'rel_officer',
        'commission',
        'commission_amt',
        'commission2',
        'commission_amt2',
        'driver_name',
        'driver_commission_amt',
        'location',
        'agn',
        'start_km',
        'end_km',
        'drived',
        'free_km',
        'over',
        'extra_km_chg',
        'hand_over_booking',
    ];

    protected $casts = [
        'due_paid' => 'boolean',
        'deposit_refunded' => 'boolean',
        'vehicle_checked' => 'boolean',
        'hand_over_booking' => 'boolean',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
