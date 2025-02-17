<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_number',
        'invoice_number',
        'type',
        'amnt',
        'station',
        'date',
    ];
}
