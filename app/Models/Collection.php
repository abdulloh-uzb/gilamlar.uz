<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    /** @use HasFactory<\Database\Factories\CollectionFactory> */
    use HasFactory;
    protected $fillable = [
        "name_uz",
        "name_ru",
        "category_id",
        "country_id"
    ];
    public function image()
    {
        return $this->morphMany(Image::class, "imageable");
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
