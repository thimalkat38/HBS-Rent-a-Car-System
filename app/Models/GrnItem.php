<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrnItem extends Model
{
    protected $fillable = [
        'grn_id',
        'inventory_id',
        'item_name',
        'quantity',
        'price_per_unit',
        'new_price'
    ];

    public function grn()
    {
        return $this->belongsTo(Grn::class);
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}