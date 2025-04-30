<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'b_name',
        'o_name',
        'email',
        'b_phone',
        'o_phone',
        'address',
        'status',
        'reg_date',
    ];

    // Define the relationship with users
    public function users()
    {
        return $this->hasMany(User::class, 'business_id'); // Foreign key in users table
    }
}
