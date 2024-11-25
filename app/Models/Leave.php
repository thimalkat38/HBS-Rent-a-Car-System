<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    // Specify the mass-assignable attributes
    protected $fillable = [
        'emp_id',
        'emp_name',
        'type',
        'reason',
        'from_date',
        'to_date',
        'leave_days',
        'status'
    ];

    // Set the default value for 'status'
    protected $attributes = [
        'status' => 'pending', // Default to 'pending'
    ];

    // Define constants for the status values
    const STATUS_PENDING = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_REJECTED = 'rejected';

    // Helper method to check if the status is 'pending'
    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    // Helper method to check if the status is 'accepted'
    public function isAccepted()
    {
        return $this->status === self::STATUS_ACCEPTED;
    }

    // Helper method to check if the status is 'rejected'
    public function isRejected()
    {
        return $this->status === self::STATUS_REJECTED;
    }
}
