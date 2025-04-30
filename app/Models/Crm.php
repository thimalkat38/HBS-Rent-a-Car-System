<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crm extends Model
{
    use HasFactory;

    protected $fillable = [

        'business_id',
        'full_name',
        'phone',
        'date',
        'subject',
        'note',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
