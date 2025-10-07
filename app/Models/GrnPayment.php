<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrnPayment extends Model
{
    protected $fillable = [
        'grn_id',
        'payment_amount',
        'notes',
        'payment_date',
        'paid_by',
    ];

    protected $casts = [
        'payment_amount' => 'decimal:2',
        'payment_date' => 'datetime',
    ];

    // Relationships
    public function grn()
    {
        return $this->belongsTo(Grn::class);
    }

    public function paidBy()
    {
        return $this->belongsTo(User::class, 'paid_by');
    }

    // Accessors
    public function getFormattedAmountAttribute()
    {
        return 'Rs. ' . number_format($this->payment_amount, 2);
    }

    public function getFormattedDateAttribute()
    {
        return $this->payment_date->format('M d, Y h:i A');
    }
}