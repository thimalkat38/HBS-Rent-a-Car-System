<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Specify which attributes can be mass-assigned.
    protected $fillable = [
        'title', 'full_name', 'phone', 'email', 'nic', 'address'
    ];
}
