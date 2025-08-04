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
        'features',
        'images',
        'display_image'
    ];

    protected $casts = [
        'features' => 'array',
        'images' => 'array',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
    public function bookings()
{
    return $this->hasMany(\App\Models\Booking::class, 'vehicle_number', 'vehicle_number');
}

}
