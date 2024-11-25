<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [

        'emp_id',
        'title',
        'emp_name',
        'age',
        'nic',
        'mobile_number',
        'join_date',
        'email',
        'address',
        'remaining_leaves',
        'photo',

    ];

    protected $casts = [
        'photo' => 'array',
    ];
}
