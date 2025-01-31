<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{

    protected $fillable = [
        "product_variant_id",
        "order_id",
        "quantity",
        "price",
        "total_price"
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    
}
