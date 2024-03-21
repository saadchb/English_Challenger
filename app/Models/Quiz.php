<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = ['title','description','duration','duration_unit','passing_grade','instant_check','negative_marking','minus_for_skip','retake','pagination','review','show_correct_answer','curriculum_id'];



    public function curricula(){
        return $this->belongsTo(
            Curriculum::class
        );
    }
        public function questions() {
            return $this->belongsToMany('App\Models\Question', 'quiz_questions', 'quiz_id', 'question_id');
        }

}

