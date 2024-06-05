<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Curriculum;
use App\Models\detailsStudent;
use App\Models\DetailStudentLesson;
use App\Models\DetailStudentQuiz;
use App\Models\review;
use App\Models\Student;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Validation\Rule;

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
        $information = array();
        $student  = Student::findOrFail($detailsStudent);
        $courses = DB::table('details_students')
        ->join('courses', 'details_students.course_id', 'courses.id')
        ->where('student_id', Auth::guard('student')->user()->id)
            ->select('courses.*')
            ->get();
        $books = DB::table('details_students')
            ->join('books', 'details_students.book_id', 'books.id')
            ->where('student_id', Auth::guard('student')->user()->id)
                ->select('books.*')
                ->get();
        $information['nbCourses'] = count($courses);
        $analyse = array();
        foreach($courses as $course){
            $lessons = DB::table('curricula')
                        ->join('lessons', 'lessons.curriculum_id','curricula.id')
                        ->where('course_id',$course->id)
                        ->select('lessons.*')
                        ->get();
            $quizzes = DB::table('curricula')
                        ->join('quizzes', 'quizzes.curriculum_id','curricula.id')
                        ->where('course_id',$course->id)
                        ->select('quizzes.*')
                        ->get();
            $totalLQ = $lessons->count() + $quizzes->count();
            $totalLQNotChecked = 0;
            $details_sutdent_id = detailsStudent::where('student_id',Auth::guard('student')->user()->id)->where('course_id',$course->id)->pluck('id')->first();
            foreach($lessons as $lesson){
                $lessonView = DetailStudentLesson::where('lesson_id', $lesson->id)->where('deatils_student_id',$details_sutdent_id)->first();
                if(empty($lessonView)){
                    $totalLQNotChecked ++;
                }
            }

            foreach($quizzes as $quiz){
                $quizView = DetailStudentQuiz::where('quiz_id', $quiz->id)->where('deatils_student_id',$details_sutdent_id)->first();
                if(empty($quizView) || $quizView->pass == 0){
                    $totalLQNotChecked ++;
                }
            }
            array_push($analyse, [
                'course_title' => $course->title,
                'totalLQ'=>$totalLQ,
                'totalLQNotChecked'=>$totalLQNotChecked,
                'progress' => ($totalLQ > 0) ? round(($totalLQNotChecked / $totalLQ) * 100) : 0
            ]);
        }
        $nbPC = 0;
        $nbFC = 0;
        foreach($analyse as $an){
            if($an['progress'] >0 && $an['progress'] !== 100){
                $nbPC++;
            }
            if($an['progress'] == 100){
                $nbFC++;
            }
        }
        $information['nbPC'] =  $nbPC;
        $information['nbFC'] =  $nbFC;
        $information['nbBooks'] =  count($books);
        $coursesIds = DB::table('details_students')
            ->join('courses', 'details_students.course_id', 'courses.id')
            ->where('student_id', Auth::guard('student')->user()->id)
            ->pluck('details_students.course_id');
        $nbcourses = $courses->count();
        $books = DB::table('details_students')
            ->join('books', 'details_students.book_id', 'books.id')
            ->where('student_id', Auth::guard('student')->user()->id)->get();
        $reviews = review::all();
        $categoriesIds = DB::table('courses')
            ->join('categories_courses', 'categories_courses.course_id', 'courses.id')
            ->join('details_students', 'details_students.course_id', 'courses.id')
            ->where('student_id',Auth::guard('student')->user()->id)
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
        return view('EnglishChallenger.studentPortofilio', compact('student', 'courses', 'books', 'reviews', 'nbcourses','coursesCategories','analyse','information'));
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
    public function update(Request $request, int $id)
    {
        $student = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'picture' => 'string|max:255', // Adjust if storing as a file differently
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('students')->ignore($id),
            ],
        ]);
        if($request->hasFile('picture')){
            $student['picture'] = $request->file('picture')->store('imagesStudents','public');
        }
        $stu = Student::findOrFail($id);
        $stu->update($student);
        return back();
    }
    public function changePassword(Request $request, $id)
    {
        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        // Assuming the student is authenticated, you can retrieve the current student like this:
        $student = Auth::guard('student')->user();
        $studentT = Student::findOrFail($student->id);
        // Check if the current password is correct
        if (!Hash::check($request->current_password, $student->password)) {
            // dd('hello');
            return back()->withErrors(['current_password' => 'The current password is incorrect'])->onlyInput('current_password');
        }else{
        // Update the student's password
        $studentT->update(['password' => Hash::make($request->password)]);

        // Return back with a success message
        return back()->with('success', 'Password updated successfully');
        }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,int $id)
    {
        if (!Hash::check($request->delete_password,Auth::guard('student')->user()->password)) {
            return back()->withErrors(['delete_password' => 'The current password is incorrect'])->onlyInput('delete_password');
        }else{
        // Update the student's password
        Student::findOrFail($id)->delete();
        FacadesSession::flush();
        Auth::logout();
        return to_route('selection');
        }

    }

    public function buyCourse($course){

        $course = Course::findOrFail($course);
        if(empty($course->sale_price) && empty($course->regular_price)){
            detailsStudent::create([
                'course_id' => $course->id,
                'student_id' => Auth::guard('student')->user()->id,
                'analyse_course' => 233
            ]);
        }
        return redirect('/');
    }
}
