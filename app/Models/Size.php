<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Size extends Model
{
    /** @use HasFactory<\Database\Factories\SizeFactory> */
    use HasFactory;
    protected $fillable = [
        "shape",
        "width",
        "height",
        "diametr"
    ];

    protected $hidden = [
        "created_at",
        "updated_at"
    ];

    public function product(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }
}
