<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\detailsStudent;
use App\Models\review;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class DetailsStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(detailsStudent $detailsStudent)
    {
        $student  = Student::findOrFail(1);
        $courses = DB::table('details_students')
            ->join('courses', 'details_students.course_id', 'courses.id')
            ->where('student_id', 1)
            ->select('courses.*')
            ->get();
        $coursesIds = DB::table('details_students')
            ->join('courses', 'details_students.course_id', 'courses.id')
            ->where('student_id', 1)
            ->pluck('details_students.course_id');
        $nbcourses = $courses->count();
        $books = DB::table('details_students')
            ->join('books', 'details_students.course_id', 'books.id')
            ->where('student_id', 1)->get();
        $reviews = review::all();
        $categoriesIds = DB::table('courses')
            ->join('categories_courses', 'categories_courses.course_id', 'courses.id')
            ->join('details_students', 'details_students.course_id', 'courses.id')
            ->where('student_id', 1)
            ->pluck('categories_courses.categorie_id'); // for extract the value
        $coursesCategories = DB::table('courses')
            ->join('categories_courses', 'categories_courses.course_id', 'courses.id')
            ->whereIn('categorie_id', $categoriesIds)
            ->whereNotIn('courses.id', $coursesIds)
            ->select('courses.*')
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
                    // dd($course->rating);
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
            foreach ($coursesCategories as $course) {
                $reviews = review::where('course_id', $course->id)->get();
                if ($reviews->isEmpty()) {
                    $course->rating = 0;
                } else {
                    $totalRating = 0;
                    foreach ($reviews as $review) {
                        $totalRating += $review->rating;
                    }
                    $course->rating = $totalRating / $reviews->count();
                    // dd($course->rating);
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
        return view('EnglishChallenger.studentPortofilio', compact('student', 'courses', 'books', 'reviews', 'nbcourses','coursesCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detailsStudent $detailsStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detailsStudent $detailsStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detailsStudent $detailsStudent)
    {
        //
    }
}
