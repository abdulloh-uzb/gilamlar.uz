<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ProductVariant extends Model
{
    /** @use HasFactory<\Database\Factories\ProductVariantFactory> */
    use HasFactory;
    protected $fillable = [
        "color_id",
        "size_id",
        "product_id",
        "base_price",
        "quantity"
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, "imageable");
    }

    public function size(): belongsTo
    {
        return $this->belongsTo(Size::class);
    }

    public function color(): belongsTo
    {
        return $this->belongsTo(Color::class);
    }
}
