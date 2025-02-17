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
        'salary',
        'advanced_salary',
        'remaining_salary',
        'acc_number',
        'bank',
        'join_date',
        'email',
        'address',
        'remaining_leaves',
        'photo',
        'doc_photos',

    ];

    protected $casts = [
        'photo' => 'array',
        'doc_photos' => 'array',
    ];
}
