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
}
