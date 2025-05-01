<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Specify which attributes can be mass-assigned
    protected $fillable = [
        'business_id',
        'title',
        'full_name',
        'phone',
        'whatsapp',
        'email',
        'nic',
        'address',
        'nic_photos',
        'dl_photos'
    ];

    // Cast JSON fields to arrays
    protected $casts = [
        'nic_photos' => 'array',
        'dl_photos' => 'array',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
