<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Blog extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'title',
        'subtitle',
        'img',
        'description',
        'content',
        'subcontent',
        'user_id',
        'tag_id',
    ];

    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }
    
}
