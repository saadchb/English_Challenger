<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curriculum extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','course_id'];
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }
    public function courses(){
        return $this->belongsTo(Course::class);
    }
}
