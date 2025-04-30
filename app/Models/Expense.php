<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $fillable = [
        'ref_no', 'cat', 'date', 'for_emp', 'for_cus', 'fuel_for', 'docs', 'amnt', 'note', 'business_id' // Add business_id to fillable
    ];

    /**
     * Automatically generate a reference number (e.g., REF0001, REF0002, ...)
     */
    public static function generateRefNo()
    {
        $lastExpense = self::orderBy('id', 'desc')->first();
        $nextNumber = $lastExpense ? ((int) substr($lastExpense->ref_no, 3)) + 1 : 1;
        return 'REF' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Boot method to set auto-generated reference number before saving
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($expense) {
            $expense->ref_no = self::generateRefNo();
            $expense->business_id = Auth::user()->business_id; // Automatically set business_id when creating a new expense
        });
    }

    /**
     * Get the full URL for the stored document file.
     */
    public function getDocumentUrl()
    {
        return $this->docs ? asset('storage/' . $this->docs) : null;
    }

    /**
     * Delete the document file from storage when an expense is deleted.
     */
    protected static function booted()
    {
        static::deleting(function ($expense) {
            if ($expense->docs) {
                Storage::disk('public')->delete($expense->docs);
            }
        });
    }
}
