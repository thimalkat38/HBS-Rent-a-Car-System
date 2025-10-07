<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventories';

    protected $fillable = [
        'Itm_id',
        'it_name',
        'min_quantity',
        'date',
        'it_images',
        'business_id',
    ];

    protected $casts = [
        'date' => 'date',
        'min_quantity' => 'integer',
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
    ];

    // Relationships
    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function issuedItems()
    {
        return $this->hasMany(IssuedItem::class);
    }

    public function batches()
    {
        return $this->hasMany(StockBatch::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->whereNotNull('id');
    }

    public function scopeLowStock($query)
    {
        return $query->whereHas('batches', function ($q) {
            $q->whereRaw('quantity <= (SELECT COALESCE(min_quantity, 0) FROM inventories WHERE inventories.id = stock_batches.inventory_id)');
        });
    }

    public function scopeOutOfStock($query)
    {
        return $query->whereDoesntHave('batches', function ($q) {
            $q->where('quantity', '>', 0);
        });
    }

    public function scopeByBusiness($query, $businessId)
    {
        return $query->where('business_id', $businessId);
    }

    // Accessors
    public function getTotalQuantityAttribute()
    {
        return $this->batches()->sum('quantity');
    }

    public function getTotalValueAttribute()
    {
        return $this->batches()->sum('batch_value');
    }

    public function getAverageUnitPriceAttribute()
    {
        $totalQuantity = $this->total_quantity;
        return $totalQuantity > 0 ? $this->total_value / $totalQuantity : 0;
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rs. ' . number_format($this->average_unit_price ?: 0, 2);
    }

    public function getFormattedTotalAttribute()
    {
        return 'Rs. ' . number_format($this->total_value ?: 0, 2);
    }

    public function getIsLowStockAttribute()
    {
        $minimum = $this->min_quantity ?: 10;
        return $this->total_quantity <= $minimum;
    }

    public function getIsOutOfStockAttribute()
    {
        return $this->total_quantity <= 0;
    }

    public function getFirstImageAttribute()
    {
        $images = $this->it_images;
        if (is_string($images)) {
            $images = json_decode($images, true);
        }
        if (is_array($images) && !empty($images)) {
            return asset('storage/' . $images[0]);
        }
        // Use a fallback image that exists in the public directory
        return asset('images/no-image.png');
    }

    public function getAllImagesAttribute()
    {
        $images = $this->it_images;
        if (is_string($images)) {
            $images = json_decode($images, true);
        }
        if (is_array($images) && !empty($images)) {
            return array_map(function ($image) {
                return asset('storage/' . $image);
            }, $images);
        }
        return [];
    }

    // Mutators
    public function setItImagesAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['it_images'] = json_encode($value);
        } else {
            $this->attributes['it_images'] = $value;
        }
    }

    // Methods
    public function hasEnoughStock($requestedQuantity)
    {
        return $this->total_quantity >= $requestedQuantity;
    }

    public function isBelowMinimumStock()
    {
        if ($this->min_quantity) {
            return $this->total_quantity <= $this->min_quantity;
        }
        return $this->total_quantity <= 10;
    }

    public function getStockStatusAttribute()
    {
        if ($this->total_quantity <= 0) {
            return 'out_of_stock';
        } elseif ($this->isBelowMinimumStock()) {
            return 'low_stock';
        } else {
            return 'in_stock';
        }
    }

    public function getStockStatusColorAttribute()
    {
        switch ($this->stock_status) {
            case 'out_of_stock':
                return 'red';
            case 'low_stock':
                return 'orange';
            default:
                return 'green';
        }
    }

    public static function generateNextItemId($businessId)
    {
        $lastItem = self::where('business_id', $businessId)
            ->orderByRaw('CAST(SUBSTRING(Itm_id, 4) AS UNSIGNED) DESC')
            ->first();

        $nextId = 1;
        if ($lastItem && preg_match('/ITM(\d+)/', $lastItem->Itm_id, $matches)) {
            $nextId = intval($matches[1]) + 1;
        }

        return 'ITM' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($inventory) {
            // Delete associated images
            if ($inventory->it_images) {
                $images = is_string($inventory->it_images) ? json_decode($inventory->it_images, true) : $inventory->it_images;
                if (is_array($images)) {
                    foreach ($images as $image) {
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($image);
                    }
                }
            }
            // Batches are deleted via cascade in database
        });
    }
}
