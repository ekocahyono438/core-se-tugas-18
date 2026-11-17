<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class OrderLog extends Model
{
    protected $fillable = [
       'order_id',
       'actifity',
       'performed_by',
 
    ]; 
    
     public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function performer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'performed_by');
    }

    


}
