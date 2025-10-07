<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockBatch extends Model
{
    protected $fillable = [
        'inventory_id', 'batch_id', 'quantity', 'unit_price', 'batch_value', 'grn_id'
    ];

    protected $casts = [
        'unit_price' => 'decimal:2',
        'batch_value' => 'decimal:2',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function grn()
    {
        return $this->belongsTo(Grn::class);
    }

    // Generate next batch ID globally (not per inventory)
    public static function generateNextBatchId($inventoryId = null)
    {
        $lastBatch = self::lockForUpdate()
            ->orderByRaw('CAST(SUBSTRING(batch_id, 6) AS UNSIGNED) DESC')
            ->first();

        $nextId = 1;
        if ($lastBatch && preg_match('/BATCH(\d+)/', $lastBatch->batch_id, $matches)) {
            $nextId = intval($matches[1]) + 1;
        }

        return 'BATCH' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
    }
}