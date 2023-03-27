<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Models\Post;

class Categories extends Model
{
    use HasFactory;

    public function Categories():hasMany
    {
        return $this->hasMany(Post::class);
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    

    protected $fillable = [
        'title',
        'parent_id',
    ];

    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    
}
