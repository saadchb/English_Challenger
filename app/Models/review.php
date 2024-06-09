<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class review extends Model
{
    use SoftDeletes;
    protected $fillable = ['comments','name','email','siteweb','school_photos','rating','student_id','teacher_id','school_id','course_id','book_id'];
    use HasFactory;
    public function course ():BelongsTo {
        return $this->belongsTo(course::class);
    }
    public function teacher():BelongsTo {
        return $this->belongsTo(Teacher::class);
    }
    public function students():BelongsTo {
        return $this->belongsTo(Student::class);
    }
    public function school():BelongsTo {
        return $this->belongsTo(School::class);
    }
    public function book():BelongsTo {
        return $this->belongsTo(Book::class);
    }
}
