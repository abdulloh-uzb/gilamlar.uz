<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Store extends Model
{
    /** @use HasFactory<\Database\Factories\StoreFactory> */
    use HasFactory;
    protected $fillable = [
        "open_time",
        "close_time",
        "phone_number"
    ];
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, "addressable");
    }
}
