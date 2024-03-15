<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];


        public function questions() {
            return $this->belongsToMany('App\Models\Question', 'quiz_questions', 'quiz_id', 'question_id');
        }

}

