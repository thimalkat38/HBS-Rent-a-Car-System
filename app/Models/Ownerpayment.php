<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ownerpayment extends Model
{
    use HasFactory;
    
    protected $table = 'ownerpayment';
    
    protected $fillable = [

        'full_name',
        'owner_id', 
        'vehicle',
        'date', 
        'paid_amnt', 
        'bank_details', 
        'acc_no', 

    ];
    
}
