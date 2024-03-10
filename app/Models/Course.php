<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'img','sale_price','regular_price', 'sale_start_dates','sale_end_dates','course_view','there_is_no_enrollment_requirement','passing_grade','evaluation','duration','duration_gauge','blocked_content_by_duration','blocked_content_by_student','allow_repurchase','repurchase_action','level','fake_students_enrolled','finish_button','add_to_featured_list','external_link','students_list','re_take_course','max_student','featured_review','id_categorie','id_tag','id_school','id_curriculm','id_lesson' ];
}
