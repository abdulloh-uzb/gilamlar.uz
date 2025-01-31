<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Model
{
    /** @use HasFactory<\Database\Factories\ColorFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ["name_uz", "name_ru", "code"];


    public function product(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }
}
