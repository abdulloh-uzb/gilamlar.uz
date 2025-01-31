<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Style extends Model
{
    /** @use HasFactory<\Database\Factories\StyleFactory> */
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "name_uz",
        "name_ru"
    ];
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
