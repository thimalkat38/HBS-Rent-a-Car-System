<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_name',
        'vehicle_type',
        'vehicle_number',
        'vehicle_model',
        'engine_number',
        'fuel_type',
        'chassis_number',
        'model_year',
        'price_per_day',
        'free_km',
        'extra_km_chg',
        'features',
        'images',
    ];

    protected $casts = [
        'features' => 'array',
        'images' => 'array',
    ];
}
