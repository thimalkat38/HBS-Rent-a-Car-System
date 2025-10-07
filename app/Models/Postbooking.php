<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostBooking extends Model
{
    use HasFactory;

    protected $table = 'postbookings';

    protected $fillable = [
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
        'agn',
        'start_km',
        'end_km',
        'drived',
        'free_km',
        'over',
        'extra_km_chg',
    ];

    protected $casts = [
        'due_paid' => 'boolean',
        'deposit_refunded' => 'boolean',
        'vehicle_checked' => 'boolean',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
