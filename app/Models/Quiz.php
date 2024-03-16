<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','duration','duration_unit','passing_grade','instant_check','negative_marking','minus_for_skip','retake','pagination','review','show_correct_answer'];
        public function questions() {
            return $this->belongsToMany('App\Models\Question', 'quiz_questions', 'quiz_id', 'question_id');
        }
    
}