<?php

namespace App\Http\Controllers;

use App\Models\detailsStudent;
use App\Models\review;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        ->join('courses', 'details_students.course_id' ,'courses.id')
        ->where('student_id',1)->get();
        $nbcourses = $courses->count();
        $books = DB::table('details_students')
        ->join('books', 'details_students.course_id' ,'books.id')
        ->where('student_id',1)->get();
        $reviews = review::all();
        $categories = DB::table('courses')
        ->join('categories_courses', 'categories_courses.course_id','courses.id')
        ->join('details_students','details_students.course_id', 'courses.id')
        ->where('student_id',1)
        ->select('categories_courses.categorie_id')->get();
        // dd($categories);
        $coursesCategories = DB::table('courses')
        ->join('categories_courses','categories_courses.course_id','courses.id')
        ->whereIn('categorie_id',$categories);
        // ->get();
        dd($coursesCategories);
        foreach ($courses as $course) {
            $review = review::where('course_id', $course->id)->get()->first();
            if (!$review) {
                $course->rating = 0;
            } else {
                $course->rating = $review->rating;
            }
        }
        return view('EnglishChallenger.studentPortofilio',compact('student','courses','books','reviews','nbcourses'));
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
