<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        "name_uz",
        "name_ru"
    ];

    public function collection(): HasMany
    {
        return $this->hasMany(Collection::class);
    }
}
