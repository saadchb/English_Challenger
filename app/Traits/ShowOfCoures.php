<?php
// app/Traits/CourseTrait.php

namespace App\Traits;

use App\Models\Quiz;
use App\Models\Lesson;
use App\Models\Curriculum;
use App\Models\Course;
use App\Models\Requirement;
use App\Models\Tag;
use App\Models\Categorie;
use App\Models\review;
use Illuminate\Support\Facades\DB;

trait ShowOfCoures
{
    public function showOfCoures(int $id)
    {
        $quizzes = Quiz::all();
        $lessons = Lesson::all();
        $curricula = Curriculum::all();
        $review = review::where('course_id', $id)->first();

        $course = Course::findOrFail($id);
        $requirements = Requirement::where('course_id', $id)->get();
        $tags = Tag::join('tags_courses', 'tags.id', '=', 'tags_courses.tag_id')
            ->where('course_id', $id)
            ->get('title');
        $categories = Categorie::join('categories_courses', 'categories.id', '=', 'categories_courses.categorie_id')->where('course_id', $id)->get('title');
        $courses = DB::table('courses')
            ->join('categories_courses', 'courses.id', '=', 'categories_courses.course_id')
            ->join('categories', 'categories.id', '=', 'categories_courses.categorie_id')
            ->select('courses.*')
            ->whereIn('categories.title', $categories)
            ->where('courses.id', '!=', $id)
            ->get();

        return [
            'course' => $course,
            'categories' => $categories,
            'requirements' => $requirements,
            'tags' => $tags,
            'courses' => $courses,
            'curricula' => $curricula,
            'lessons' => $lessons,
            'quizzes' => $quizzes,
            'review' => $review
        ];
    }
}
