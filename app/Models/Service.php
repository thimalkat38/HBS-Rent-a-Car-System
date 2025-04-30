<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'vehicle_number',
        'invoice_number',
        'type',
        'current_mileage',
        'next_mileage',
        'amnt',
        'station',
        'date',
        'next_date'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
