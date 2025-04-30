<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'date',
        'month',
        'amnt',
        'advanced_amnt'
    ];
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
