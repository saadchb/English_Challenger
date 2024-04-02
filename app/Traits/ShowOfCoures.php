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
use App\Models\detailsStudent;
use App\Models\review;
use Illuminate\Support\Facades\DB;

trait ShowOfCoures
{
    public function showOfCoures(int $id)
    {
        $quizzes = Quiz::all();
        $lessons = Lesson::all();

        $quizzesC = Quiz::orderBy('order', 'asc')->get()->toArray();
        $lessonsMix = Lesson::orderBy('order', 'asc')->get()->toArray();
        foreach ($quizzesC as $quiz) {
            $lessonsMix[] = $quiz;
        }
        usort($lessonsMix, function ($a, $b) {
            return $a['order'] <=> $b['order'];
        });

        $curricula = Curriculum::where('course_id', $id)->get();
        $review = review::where('course_id', $id)->first();

        $courseC = Course::findOrFail($id);
        $nblessonsbycourse = $courseC->nblessonsbycourse();
        $requirements = Requirement::where('course_id', $id)->get();
        $tags = Tag::join('tags_courses', 'tags.id', '=', 'tags_courses.tag_id')
            ->where('course_id', $id)
            ->get('title');
        $categories = Categorie::join('categories_courses', 'categories.id', '=', 'categories_courses.categorie_id')->where('course_id', $id)->get();
        $categoriesC = Categorie::join('categories_courses', 'categories.id', '=', 'categories_courses.categorie_id')->where('course_id', $id)->pluck('title');
        $courses = DB::table('courses')
            ->join('categories_courses', 'courses.id', '=', 'categories_courses.course_id')
            ->join('categories', 'categories.id', '=', 'categories_courses.categorie_id')
            ->select('courses.*')
            ->where('courses.id','!=', $id)
            ->whereIn('categories.title', $categoriesC)
            ->distinct()
            ->get();
        foreach ($courses as $course) {
            $reviews = review::where('course_id', $course->id)->get();
            if ($reviews->isEmpty()) {
                $course->rating = 0;
            } else {
                $totalRating = 0;
                foreach ($reviews as $review) {
                    $totalRating += $review->rating;
                }
                $course->rating = $totalRating / $reviews->count();
            }
            $courseFake = Course::findOrFail($course->id);
            $course->nblessonsbycourses = $courseFake->nblessonsbycourse();
            $nbstudents = DB::table('details_students')
            ->where('course_id', $course->id)
            ->select('student_id')
            ->distinct()
            ->count();
            $course->fake_students_enrolled += $nbstudents;
        }
        // dd($courseC);
        return [
            'course' => $courseC,
            'categories' => $categories,
            'requirements' => $requirements,
            'tags' => $tags,
            'courses' => $courses,
            'curricula' => $curricula,
            'lessons' => $lessons,
            'quizzes' => $quizzes,
            'review' => $review,
            'lessonsMix' => $lessonsMix,
            'nblessonsbycourse'=>$nblessonsbycourse
        ];
    }
}
