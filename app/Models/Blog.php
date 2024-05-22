<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'teacher_id',
        'tag_id',
    ];

    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function tecaher():BelongsTo{
        return $this->belongsTo(Teacher::class);
    }
}
