<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product_image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'product_id'
    ];
    public function product_variant():BelongsTo{
        return $this->belongsTo(product_variant::class);
    }
    public function product():BelongsTo{
        return $this->belongsTo(product::class);
    }
}
