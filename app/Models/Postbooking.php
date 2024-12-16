<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostBooking extends Model
{
    use HasFactory;

    protected $table = 'postbookings';

    protected $fillable = [
        'full_name',
        'nic',
        'mobile_number',
        'vehicle_number',
        'vehicle',
        'from_date',
        'to_date',
        'base_price',
        'after_additional',
        'reason',
        'after_discount',
        'paid',
        'due',
        'total_income',
        'due_paid',
        'deposit_refunded',
        'vehicle_checked',
    ];

    protected $casts = [
        'due_paid' => 'boolean',
        'deposit_refunded' => 'boolean',
        'vehicle_checked' => 'boolean',
    ];
}
