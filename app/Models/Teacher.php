<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id', 'updated_at' ,'created_at','deleted_at'];
    
    public function books():HasMany{
        return $this->hasMany(Book::class);
    }
    public function review():HasMany{
        return $this->hasMany(review::class);
    }
    public function student():HasMany{
        return $this->hasMany(Student::class);
    }
    public function bolgs():HasMany{
        return $this->hasMany(Blog::class);
    }
    public function course():HasMany{
        return $this->hasMany(Course::class);
    }
      public function quizzes():HasMany{
        return $this->hasMany(Quiz::class);
    }
    public function lessons():BelongsTo{
        return $this->belongsTo(Lesson::class);
    }
}
