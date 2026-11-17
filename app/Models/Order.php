<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'order_number',
        'order_date',
        'total',
        'status',
        'approved_at',
        'approved_by'
    ];
    public function Customer(): BelongsTo {
        return $this->belongsTo(Customer::class);
    }

    public function approver(): BelongsTo {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public static function requiresApproval(float $total): bool{
        return $total >= 1000000;
    }

    public function logs(): HasMany
    {
    return $this->hasMany(OrderLog::class);
    }


    
}
