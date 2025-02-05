<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ["name_uz", "name_ru"];

    public $hidden = [
        "created_at",
        "updated_at",
        "deleted_at"
    ];

    public function collection(): HasMany
    {
        return $this->hasMany(Collection::class);
    }

}
