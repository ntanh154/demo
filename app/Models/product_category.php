<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;


class product_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function product_category():hasMany
    {
        return $this->hasMany(product_category::class);
    }
    
}
