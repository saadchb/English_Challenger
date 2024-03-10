<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = ['option_text', 'is_correct'];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
