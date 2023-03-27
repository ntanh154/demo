<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_category_id',
        'description',
        'price',
        'quantity',
        'status',
        'is_variant'
    ];
    public function product_image():HasMany
    {
        return $this->hasMany(product_image::class);
    }
    public function productVariant():HasMany
    {
        return $this->hasMany(product_variant::class);
    }
    
}
