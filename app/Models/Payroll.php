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
        'month',
        'leaves',
        'basic',
        'paid_date',
        'earnings',
        'deductions',
        'gross'
    ];

    /**
     * Cast earnings and deductions to array automatically
     */
    protected $casts = [
        'earnings' => 'array',
        'deductions' => 'array',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'emp_id');
    }
}
