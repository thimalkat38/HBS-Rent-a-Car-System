<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidOwner extends Model
{
    use HasFactory;

    protected $table = 'paidowners';

    protected $fillable = [
        'business_id',
        'owner_id',
        'full_name',
        'vehicle',
        'acc_no',
        'bank_details',
        'date',
        'paid_amnt',
    ];

    protected $casts = [
        'date' => 'date',
        'paid_amnt' => 'decimal:2',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
