<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grn extends Model
{
    use HasFactory;

    protected $fillable = [
        'grn_id',
        'supplier_id',
        'date',
        'reference_no',
        'total_grn_value',
        'paid_value',
        'status',
        'notes',
        'business_id',
    ];

    protected $casts = [
        'date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function items()
    {
        return $this->hasMany(GrnItem::class, 'grn_id');
    }

    public function payments()
    {
        return $this->hasMany(GrnPayment::class, 'grn_id')->orderBy('payment_date', 'desc');
    }

    public static function generateNextGrnId($businessId)
    {
        $lastGrn = self::where('business_id', $businessId)
            ->orderByRaw('CAST(SUBSTRING(grn_id, 4) AS UNSIGNED) DESC')
            ->first();

        $nextId = 1;
        if ($lastGrn && preg_match('/GRN(\d+)/', $lastGrn->grn_id, $matches)) {
            $nextId = intval($matches[1]) + 1;
        }

        return 'GRN' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }
}