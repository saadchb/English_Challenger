<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class quiz_question extends Model
{
    use HasFactory;
    protected $fillable = ['quiz_id','question_id'];
}
