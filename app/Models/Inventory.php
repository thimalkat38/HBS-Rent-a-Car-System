<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    // protected $table = 'inventory';

    // Specify which attributes can be mass-assigned
    protected $fillable = [

        'business_id',
        'Itm_id',
        'it_name',
        'quantity',
        'date',
        'price_per_unit',
        'total_price',
        'it_images'
    ];

    // Cast JSON fields to arrays
    protected $casts = [
        'it_images' => 'array',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
