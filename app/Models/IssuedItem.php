<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class IssuedItem extends Model
{
    use HasFactory;

    protected $table = 'issued_items';

    protected $fillable = [
        'issue_id',
        'inventory_id',
        'item_name',
        'quantity_issued',
        'price_per_unit',
        'total_value',
        'issue_date',
        'issue_type',
        'vehicle_id',
        'vehicle_number',
        'employee_id',
        'employee_nic',
        'employee_name',
        'notes',
        'status',
        'issued_by',
        'business_id',
        'returned_at',
        'return_notes',
        'return_quantity'
    ];

    protected $casts = [
        'price_per_unit' => 'decimal:2',
        'total_value' => 'decimal:2',
        'issue_date' => 'date',
        'returned_at' => 'datetime',
        'quantity_issued' => 'integer',
        'return_quantity' => 'integer'
    ];

    protected $dates = [
        'issue_date',
        'returned_at',
        'created_at',
        'updated_at',        
    ];

    // Relationships
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function issuedBy()
    {
        return $this->belongsTo(User::class, 'issued_by');
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    // Scopes
    public function scopeIssued($query)
    {
        return $query->where('status', 'issued');
    }

    public function scopeReturned($query)
    {
        return $query->where('status', 'returned');
    }

    public function scopePartiallyReturned($query)
    {
        return $query->where('status', 'partially_returned');
    }

    public function scopeByBusiness($query, $businessId)
    {
        return $query->where('business_id', $businessId);
    }

    public function scopeByIssueType($query, $type)
    {
        return $query->where('issue_type', $type);
    }

    public function scopeByVehicle($query, $vehicleId)
    {
        return $query->where('vehicle_id', $vehicleId);
    }

    public function scopeByEmployee($query, $employeeId)
    {
        return $query->where('employee_id', $employeeId);
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    // Accessors
    public function getFormattedTotalValueAttribute()
    {
        return 'Rs. ' . number_format($this->total_value, 2);
    }

    public function getFormattedPricePerUnitAttribute()
    {
        return 'Rs. ' . number_format($this->price_per_unit, 2);
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'issued' => '<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Issued</span>',
            'returned' => '<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Returned</span>',
            'partially_returned' => '<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Partially Returned</span>',
            'lost' => '<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Lost</span>',
            'damaged' => '<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-800">Damaged</span>'
        ];

        return $badges[$this->status] ?? '<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">' . ucfirst($this->status) . '</span>';
    }

    public function getIssueTypeDisplayAttribute()
    {
        $types = [
            'vehicle' => 'Vehicle Only',
            'employee' => 'Employee Only',
            'both' => 'Vehicle & Employee'
        ];

        return $types[$this->issue_type] ?? ucfirst($this->issue_type);
    }

    public function getIsReturnableAttribute()
    {
        return in_array($this->status, ['issued', 'partially_returned']);
    }

    public function getRemainingQuantityAttribute()
    {
        if ($this->status === 'returned') {
            return 0;
        }
        
        $returnedQuantity = self::where('issue_id', $this->issue_id)
                               ->where('inventory_id', $this->inventory_id)
                               ->where('status', 'returned')
                               ->sum('quantity_issued');
        
        return $this->quantity_issued - $returnedQuantity;
    }

    public function getDaysIssuedAttribute()
    {
        if ($this->status === 'returned' && $this->returned_at) {
            return $this->issue_date->diffInDays($this->returned_at);
        }
        
        return $this->issue_date->diffInDays(now());
    }

    // Methods
    public function markAsReturned($returnQuantity = null, $notes = null)
    {
        $returnQuantity = $returnQuantity ?? $this->quantity_issued;
        
        if ($returnQuantity >= $this->quantity_issued) {
            $this->status = 'returned';
        } else {
            $this->status = 'partially_returned';
        }
        
        $this->return_quantity = $returnQuantity;
        $this->returned_at = now();
        $this->return_notes = $notes;
        
        return $this->save();
    }

    public function markAsLost($notes = null)
    {
        $this->status = 'lost';
        $this->return_notes = $notes;
        $this->returned_at = now();
        
        return $this->save();
    }

    public function markAsDamaged($notes = null)
    {
        $this->status = 'damaged';
        $this->return_notes = $notes;
        $this->returned_at = now();
        
        return $this->save();
    }

    public function canBeReturned()
    {
        return $this->is_returnable && $this->remaining_quantity > 0;
    }

    // Static methods
    public static function generateNextIssueId($businessId)
    {
        $lastIssue = self::where('business_id', $businessId)
                        ->orderBy('issue_id', 'desc')
                        ->first();
        
        $nextNumber = 1;
        if ($lastIssue && preg_match('/ISS(\d+)/', $lastIssue->issue_id, $matches)) {
            $nextNumber = intval($matches[1]) + 1;
        }
        
        return 'ISS' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public static function getIssueStats($businessId, $dateFrom = null, $dateTo = null)
    {
        $query = self::where('business_id', $businessId);
        
        if ($dateFrom) {
            $query->where('issue_date', '>=', $dateFrom);
        }
        
        if ($dateTo) {
            $query->where('issue_date', '<=', $dateTo);
        }
        
        return [
            'total_issues' => $query->count(),
            'total_value' => $query->sum('total_value'),
            'issued_items' => $query->where('status', 'issued')->count(),
            'returned_items' => $query->where('status', 'returned')->count(),
            'lost_items' => $query->where('status', 'lost')->count(),
            'damaged_items' => $query->where('status', 'damaged')->count(),
        ];
    }

    // Boot method for model events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($issuedItem) {
            if (empty($issuedItem->status)) {
                $issuedItem->status = 'issued';
            }
            
            if (empty($issuedItem->issue_date)) {
                $issuedItem->issue_date = now();
            }
        });

        static::updating(function ($issuedItem) {
            // Recalculate total value if quantity or price changed
            if ($issuedItem->isDirty(['quantity_issued', 'price_per_unit'])) {
                $issuedItem->total_value = $issuedItem->quantity_issued * $issuedItem->price_per_unit;
            }
        });
    }
}