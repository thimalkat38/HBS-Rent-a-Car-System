<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleOwner extends Model
{
    use HasFactory;

    protected $table = 'vehicleowners';

    protected $fillable = [
        'business_id',
        'owner_id',
        'title',
        'full_name',
        'vehicle_number',
        'vehicle_name',
        'phone',
        'address',
        'start_date',
        'end_date',
        'rental_amnt',
        'monthly_km',
        'extra_km_chg',
        'acc_no',
        'bank_detais',
    ];

    // Auto-generate owner_id
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vehicleOwner) {
            $lastOwner = self::orderBy('id', 'desc')->first();
            $nextId = $lastOwner ? ((int)substr($lastOwner->owner_id, 2) + 1) : 1;
            $vehicleOwner->owner_id = 'VO' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

            // Set default rem_rental as rental_amnt
            $vehicleOwner->rem_rental = $vehicleOwner->rental_amnt;
        });
    }


    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
