<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','question_type','points','hint'];
    public function quizzes() {
        return $this->belongsToMany('App\Models\Quiz', 'quiz_questions', 'question_id', 'quiz_id');
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
