<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [

        'business_id',
        'emp_id',
        'emp_name',
        'date',
        'type',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
