<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Course;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title','video_link','description','duration_unit','duration','priview','order','curriculum_id','teacher_id'];

    public function curricula(){
        return $this->belongsTo(
            Curriculum::class
        );
    }
    public function teacher():BelongsTo{
        return $this->belongsTo(Teacher::class);
    }
}
