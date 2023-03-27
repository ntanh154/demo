<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class product_variant extends Model
{
    use HasFactory;

    public function product_variant():HasMany
    {
        return $this->hasMany(product_image::class);
    }
    public function product():BelongsTo{
        return $this->belongsTo(product::class);
    }

    protected $fillable = [
        'price',
        'quantity',
        'status',
        'name',
        'value',
        'product_id',
        'variant_id'
    ];
    
}
