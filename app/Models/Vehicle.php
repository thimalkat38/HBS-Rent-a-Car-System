<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'vehicle_name',
        'vehicle_type',
        'vehicle_number',
        'vehicle_model',
        'engine_number',
        'fuel_type',
        'chassis_number',
        'model_year',
        'license_exp_date',
        'insurance_exp_date',
        'price_per_day',
        'free_km',
        'extra_km_chg',
        'current_mileage',
        'features',
        'images',
        'display_image',
        'status',
    ];

    protected $casts = [
        'features' => 'array',
        'images'   => 'array',
        'status'   => 'integer', // ✅ cast to int
    ];

    // Relationships
    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class, 'vehicle_number', 'vehicle_number');
    }

    public function postBookings()
    {
        return $this->hasMany(\App\Models\PostBooking::class, 'vehicle_number', 'vehicle_number');
    }

    // ✅ Helpful query scopes
    public function scopeActive($query)
    {
        return $query->where('status', 0);
    }

    public function scopeInService($query)
    {
        return $query->where('status', 1);
    }

    // (Optional) quick label accessor
    public function getStatusLabelAttribute(): string
    {
        return $this->status === 1 ? 'In Service/Repair' : 'Active';
    }
}
