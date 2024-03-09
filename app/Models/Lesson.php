<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use App\Models\Course;


class Lesson extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','duration','priview','course_id'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
