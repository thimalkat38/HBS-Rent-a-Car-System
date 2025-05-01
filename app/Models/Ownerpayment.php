<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ownerpayment extends Model
{
    use HasFactory;

    protected $table = 'ownerpayment';

    protected $fillable = [

        'business_id',
        'full_name',
        'owner_id',
        'vehicle',
        'date',
        'paid_amnt',
        'bank_details',
        'acc_no',
        'receipt'

    ];
    protected $casts = [
        'receipt' => 'array',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
