<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [

        'business_id',
        'emp_id',
        'emp_name',
        'acc_num',
        'note',
        'paid_date',
        'paid_amnt',

    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
