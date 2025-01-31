<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;

    protected $fillable = [
        "home",
        "street",
        "city",
        "region",
        "latitude",
        "longitude",
        "addressable_id",
        "addressable_type"
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}
