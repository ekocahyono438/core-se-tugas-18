<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Order extends Model
{
    public const STATUS_PENDING = 'pending';

    protected $fillable = [
        'customer_id',
        'order_number',
        'service_id',
        'order_date',
        'total',
        'status',
        'approved_at',
        'approved_by'
    ];

    protected function casts(): array
    {
        return [
            'total' => 'decimal:2',
            'order_date' => 'datetime',
            'approved_at' => 'datetime',
        ];
    }
    
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

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }


    
}
