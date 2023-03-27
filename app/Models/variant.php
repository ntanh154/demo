<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;


class variant extends Model
{
    use HasFactory;

    public function variant():hasMany
    {
        return $this->hasMany(product_variant::class);
    }


    protected $fillable = [
        'name'
    ];
}
