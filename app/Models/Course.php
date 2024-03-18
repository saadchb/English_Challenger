<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title', 'description', 'img','sale_price','regular_price', 'sale_start_dates','sale_end_dates','course_view','there_is_no_enrollment_requirement','passing_grade','evaluation','duration','duration_gauge','blocked_content_by_duration','blocked_content_by_student','allow_repurchase','repurchase_action','level','fake_students_enrolled','finish_button','add_to_featured_list','external_link','students_list','re_take_course','max_student','featured_review','id_categorie','id_tag','id_school','id_curriculm','id_lesson' ];

    public function curricula():HasMany{
        return $this->hasMany(Curriculum::class);
    }
    public function school():BelongsTo{
        return $this->belongsTo(School::class);
    }
    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Curriculum::class);
    }
    public function nblessonsbycourse(){
        return $this->lessons()->count();
    }
    public static function nbcourses()
    {
        return self::count();
    }
}
