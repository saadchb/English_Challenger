<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Curriculum;
use App\Models\detailsStudent;
use App\Models\DetailStudentLesson;
use App\Models\DetailStudentQuiz;
use App\Models\Lesson;
use App\Models\Option;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurriculumController extends Controller
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
        $request->validate([
            'title' => 'required',

        ]);
        Curriculum::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $course)
    {
        $retaking = 0;
        $testViewStudent = DetailStudentLesson::join('details_students', 'details_students.id', 'detail_student_lessons.deatils_student_id')
            ->where('course_id', $course)
            ->where('student_id', $request->input('student_id'))
            ->where('lesson_id', $request->input('lesson_id'))
            ->get();
        if (count($testViewStudent) == 0) {
            $detailsStudent = detailsStudent::where('course_id', $course)
                ->where('student_id', (int)$request->input('student_id'))
                ->first();
            // dd($detailsStudent);
            DetailStudentLesson::create(array(
                'view' => 1,
                'deatils_student_id' => $detailsStudent->id,
                'lesson_id' => $request->input('lesson_id')
            ));
        }
        $pass = 0;
        $lessons = Lesson::all();
        $quizzes = Quiz::all();

        $quizzesC = Quiz::orderBy('order', 'asc')->get()->toArray();
        $lessonsMix = Lesson::orderBy('order', 'asc')->get()->toArray();
        foreach ($quizzesC as $quiz) {
            $lessonsMix[] = $quiz;
        }
        usort($lessonsMix, function ($a, $b) {
            return $a['order'] <=> $b['order'];
        });
        if ($request->input('type') == 'quiz') {
            $id = $request->input('lesson_id');
            $quizActive = Quiz::where('id', $id)->first();
            $questions = DB::table('questions')
                ->join('quiz_questions', 'quiz_questions.question_id', 'questions.id')
                ->where('quiz_id', $id)
                ->select('questions.*')
                ->get();
            $options = Option::all();
            $pass = DetailStudentQuiz::join('details_students', 'details_students.id', 'detail_student_quizzes.deatils_student_id')
                ->where('course_id', $course)
                ->where('student_id', $request->input('student_id'))
                ->where('quiz_id', $request->input('lesson_id'))
                ->pluck('pass')
                ->first();
            // dd($pass);
            $retaking  = DetailStudentQuiz::join('details_students', 'details_students.id', 'detail_student_quizzes.deatils_student_id')
                ->where('course_id', $course)
                ->where('student_id', $request->input('student_id'))
                ->where('quiz_id', $request->input('lesson_id'))
                ->pluck('retaking')
                ->first();
            if ($pass == null) {
                $pass = 0;
            }
        } else {
            $quizActive = null;
            $questions = null;
            $options = null;
        }
        if ($request->input('type') == 'lesson') {
            $lessonActive = Lesson::where('id', $request->input('lesson_id'))->first();
            $parts = explode('/', $lessonActive->video_link);
            $lessonActive->video_link = end($parts);
        } else {
            $lessonActive = null;
        }
        foreach ($lessonsMix as $key => $lesson) {
            if ($lesson['type'] == 'lesson') {
                $view = DetailStudentLesson::join('details_students', 'details_students.id', 'detail_student_lessons.deatils_student_id')
                    ->where('course_id', $course)
                    ->where('student_id', $request->input('student_id'))
                    ->where('lesson_id', $lesson['id'])
                    ->pluck('view')
                    ->first();
                $lesson['view'] = $view;
            }
            $lessonsMix[$key] = $lesson;
        }
        foreach ($lessonsMix as $key => $lesson) {
            if ($lesson['type'] == 'quiz') {
                $passs = DetailStudentQuiz::join('details_students', 'details_students.id', 'detail_student_quizzes.deatils_student_id')
                    ->where('course_id', $course)
                    ->where('student_id', $request->input('student_id'))
                    ->where('quiz_id', $lesson['id'])
                    ->pluck('pass')
                    ->first();
                $lesson['pass'] = $passs;
            }
            $lessonsMix[$key] = $lesson;
        }
        $retaking === null ? $retaking = 0 : $retaking = $retaking;
        $curricula = Curriculum::where('course_id', $course)->get();
        $course = Course::findOrFail($course);
        return view('EnglishChallenger.curriculum_list', [
            'lessons' => $lessons,
            'quizzes' => $quizzes,
            'curricula' => $curricula,
            'course' => $course,
            'lessonActive' => $lessonActive,
            'lessonsMix' => $lessonsMix,
            'quizActive' => $quizActive,
            'questions' => $questions,
            'options' => $options,
            'pass' => $pass,
            'retaking' => $retaking
        ]);
    }
    public function general_test(Request $request){
            $GTest = true;
            $id = $request->input('quiz_id');
            $curriculum_id = Quiz::find($id)->curriculum_id;
            $course = Curriculum::find($curriculum_id)->course_id;
            $quizActive = Quiz::where('id', $id)->first();
            $questions = DB::table('questions')
                ->join('quiz_questions', 'quiz_questions.question_id', 'questions.id')
                ->where('quiz_id', $id)
                ->select('questions.*')
                ->get();
            $options = Option::all();
            $pass = DetailStudentQuiz::join('details_students', 'details_students.id', 'detail_student_quizzes.deatils_student_id')
                ->where('course_id', $course)
                ->where('student_id', $request->input('student_id'))
                ->where('quiz_id', $request->input('quiz_id'))
                ->pluck('pass')
                ->first();
            $retaking  = DetailStudentQuiz::join('details_students', 'details_students.id', 'detail_student_quizzes.deatils_student_id')
                ->where('course_id', $course)
                ->where('student_id', $request->input('student_id'))
                ->where('quiz_id', $request->input('quiz_id'))
                ->pluck('retaking')
                ->first();
            $lessons = null;
            $quizzes = null;
            $curricula = array();
            $lessonActive = null;
            $lessonsMix = null;
            $course = Course::find($course);
        $retaking === null ? $retaking = 0 : $retaking = $retaking;
        if ($pass == null) {
            $pass = 0;
        }
        return view('EnglishChallenger.curriculum_list', [
            'lessons' => $lessons,
            'quizzes' => $quizzes,
            'curricula' => $curricula,
            'course' => $course,
            'lessonActive' => $lessonActive,
            'lessonsMix' => $lessonsMix,
            'quizActive' => $quizActive,
            'questions' => $questions,
            'options' => $options,
            'pass' => $pass,
            'retaking' => $retaking,
            'GTest' => $GTest
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curriculum $curriculum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $curriculum = Curriculum::findOrFail($id);
        $curriculum->update($request->all());
        // dd($curriculum);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $curriculum = Curriculum::findOrFail($id);
        $curriculum->delete();
        return redirect()->back();
    }
    public function CL(Request $request, int $id)
    {
        $lessonsOrderLast = Lesson::where('curriculum_id', $id)->orderBy('order', 'desc')->pluck('order')->first();
        $quizzesOrderLast = Quiz::where('curriculum_id', $id)->orderBy('order', 'desc')->pluck('order')->first();
        $nbStart = $lessonsOrderLast;
        if ($quizzesOrderLast > $lessonsOrderLast) {
            $nbStart = $quizzesOrderLast;
        }
        $nbStart++;
        $lessons_quizzes = $request->input('lessons_quizzes');
        foreach ($lessons_quizzes as $key => $item) {
            $it = Lesson::findOrFail($item);
            $it->update(['curriculum_id' => $id, 'order' => $key + $nbStart]);
        }
        return redirect()->back();
    }
    public function CQ(Request $request, int $id)
    {
        $lessonsOrderLast = Lesson::where('curriculum_id', $id)->orderBy('order', 'desc')->pluck('order')->first();
        $quizzesOrderLast = Quiz::where('curriculum_id', $id)->orderBy('order', 'desc')->pluck('order')->first();
        $nbStart = $lessonsOrderLast;
        if ($quizzesOrderLast > $lessonsOrderLast) {
            $nbStart = $quizzesOrderLast;
        }
        $nbStart++;
        $lessons_quizzes = $request->input('lessons_quizzes');
        // dd($lessons_quizzes);
        foreach ($lessons_quizzes as $key => $item) {
            $it = Quiz::findOrFail($item);
            $it->update(['curriculum_id' => $id, 'order' => $key + $nbStart]);
        }
        return redirect()->back();
    }
    public function next(Request $request, int $id)
    {
        $retaking = 0;
        $testViewStudent = DetailStudentLesson::join('details_students', 'details_students.id', 'detail_student_lessons.deatils_student_id')
            ->where('course_id', $id)
            ->where('student_id', $request->input('student_id'))
            ->where('lesson_id', $request->input('lesson_id'))
            ->get();
        // dd($testViewStudent);
        if (count($testViewStudent) == 0) {
            $detailsStudent = detailsStudent::where('course_id', $id)
                ->where('student_id', $request->input('student_id'))
                ->first();
            DetailStudentLesson::create(array(
                'view' => 1,
                'deatils_student_id' => $detailsStudent->id,
                'lesson_id' => $request->input('lesson_id')
            ));
        }
        $lessons = Lesson::all();
        $quizzes = Quiz::all();

        $quizzesC = Quiz::orderBy('order', 'asc')->get()->toArray();
        $lessonsMix = Lesson::orderBy('order', 'asc')->get()->toArray();
        foreach ($quizzesC as $quiz) {
            $lessonsMix[] = $quiz;
        }
        usort($lessonsMix, function ($a, $b) {
            return $a['order'] <=> $b['order'];
        });
        $retaking = 0;
        if ($request->input('type') == 'quiz') {

            $id = $request->input('lesson_id');
            $quizActive = Quiz::where('id', $id)->first();
            $questions = DB::table('questions')
                ->join('quiz_questions', 'quiz_questions.question_id', 'questions.id')
                ->where('quiz_id', $id)
                ->select('questions.*')
                ->get();
            $retaking  = DetailStudentQuiz::join('details_students', 'details_students.id', 'detail_student_quizzes.deatils_student_id')
                ->where('course_id', $id)
                ->where('student_id', $request->input('student_id'))
                ->where('quiz_id', $quizActive->id)
                ->pluck('retaking')
                ->first();
            $options = Option::all();
        } else {
            $quizActive = null;
            $questions = null;
            $options = null;
        }
        $passStudent = null;
        $quizActive = DB::table('quizzes')->where('order', $request->input('order') + 1)->first();

        $lessonNext = DB::table('lessons')->where('order', $request->input('order') + 1)->first();
        // dd($lessonNext);
        if (empty($lessonNext) && !empty($quizActive)) {
            $lessonNext = null;
            $options =  Option::all();
            $questions = DB::table('questions')
                ->join('quiz_questions', 'quiz_questions.question_id', 'questions.id')
                ->where('quiz_id', $quizActive->id)
                ->select('questions.*')
                ->get();
            $idSt = detailsStudent::where('student_id', $request->input('student_id'))
                ->where('course_id', $id)
                ->pluck('id');
            $passStudent = DetailStudentQuiz::where('quiz_id', $quizActive->id)
                ->where('deatils_student_id', $idSt)
                ->pluck('pass')
                ->first();
            // dd($passStudent);
        } else if (!empty($lessonNext)) {
            $parts = explode('/', $lessonNext->video_link);
            $lessonNext->video_link = end($parts);
        } else {
            $lessonNext = DB::table('lessons')->orderBy('order', 'asc')->first();
            $quizActive = DB::table('quizzes')->orderBy('order', 'asc')->first();
            if ($lessonNext->order < $quizActive->order) {
                $quizActive = null;
                $questions = null;
                $options = null;
                $parts = explode('/', $lessonNext->video_link);
                $lessonNext->video_link = end($parts);
            } else {
                $lessonNext = null;
                $options =  Option::all();
                $questions = DB::table('questions')
                    ->join('quiz_questions', 'quiz_questions.question_id', 'questions.id')
                    ->where('quiz_id', $quizActive->id)
                    ->select('questions.*')
                    ->get();
                $idSt = detailsStudent::where('student_id', $request->input('student_id'))
                    ->where('course_id', $id)
                    ->pluck('id');
                $passStudent = DetailStudentQuiz::where('quiz_id', $quizActive->id)
                    ->where('deatils_student_id', $idSt)
                    ->pluck('pass')
                    ->first();
            }
        }
        $passStudent = $passStudent == null ? 0 : $passStudent;
        $curricula = Curriculum::where('course_id', $id)->get();
        $course = Course::findOrFail($id);
        foreach ($lessonsMix as $key => $lesson) {
            if ($lesson['type'] == 'lesson') {
                $view = DetailStudentLesson::join('details_students', 'details_students.id', 'detail_student_lessons.deatils_student_id')
                    ->where('course_id', $id)
                    ->where('student_id', $request->input('student_id'))
                    ->where('lesson_id', $lesson['id'])
                    ->pluck('view')
                    ->first();
                $lesson['view'] = $view;
            }
            $lessonsMix[$key] = $lesson;
        }
        foreach ($lessonsMix as $key => $lesson) {
            if ($lesson['type'] == 'quiz') {
                $pass = DetailStudentQuiz::join('details_students', 'details_students.id', 'detail_student_quizzes.deatils_student_id')
                    ->where('course_id', $id)
                    ->where('student_id', $request->input('student_id'))
                    ->where('quiz_id', $lesson['id'])
                    ->pluck('pass')
                    ->first();
                $lesson['pass'] = $pass;
            }
            $lessonsMix[$key] = $lesson;
        }

        $retaking === null ? $retaking = 0 : $retaking = $retaking;
        return view('EnglishChallenger.curriculum_list', [
            'lessons' => $lessons,
            'quizzes' => $quizzes,
            'curricula' => $curricula,
            'course' => $course,
            'lessonActive' => $lessonNext,
            'lessonsMix' => $lessonsMix,
            'options' => $options,
            'questions' => $questions,
            'quizActive' => $quizActive,
            'pass' => $passStudent,
            'retaking' => $retaking
        ]);
    }
    public function prev(Request $request, int $id)
    {
        $retaking = 0;
        $testViewStudent = DetailStudentLesson::join('details_students', 'details_students.id', 'detail_student_lessons.deatils_student_id')
            ->where('course_id', $id)
            ->where('student_id', $request->input('student_id'))
            ->where('lesson_id', $request->input('lesson_id'))
            ->get();
        if (count($testViewStudent) == 0) {
            $detailsStudent = detailsStudent::where('course_id', $id)
                ->where('student_id', $request->input('student_id'))
                ->first();
            DetailStudentLesson::create(array(
                'view' => 1,
                'deatils_student_id' => $detailsStudent->id,
                'lesson_id' => $request->input('lesson_id')
            ));
        }
        $lessons = Lesson::all();
        $quizzes = Quiz::all();
        $quizzesC = Quiz::orderBy('order', 'asc')->get()->toArray();
        $lessonsMix = Lesson::orderBy('order', 'asc')->get()->toArray();
        foreach ($quizzesC as $quiz) {
            $lessonsMix[] = $quiz;
        }
        usort($lessonsMix, function ($a, $b) {
            return $a['order'] <=> $b['order'];
        });
        if ($request->input('type') == 'quiz') {
            $id = $request->input('lesson_id');
            $quizActive = Quiz::where('id', $id)->first();
            $questions = DB::table('questions')
                ->join('quiz_questions', 'quiz_questions.question_id', 'questions.id')
                ->where('quiz_id', $id)
                ->select('questions.*')
                ->get();
            $options = Option::all();
        } else {
            $quizActive = null;
            $questions = null;
            $options = null;
        }
        $passStudent = null;
        $quizActive = DB::table('quizzes')->where('order', $request->input('order') - 1)->first();
        $lessonPrev = DB::table('lessons')->where('order', $request->input('order') - 1)->first();
        // dd($lessonPrev);
        if (empty($lessonPrev) && !empty($quizActive)) {
            $lessonPrev = null;
            $options =  Option::all();
            $questions = DB::table('questions')
                ->join('quiz_questions', 'quiz_questions.question_id', 'questions.id')
                ->where('quiz_id', $quizActive->id)
                ->select('questions.*')
                ->get();
            $idSt = detailsStudent::where('student_id', $request->input('student_id'))
                ->where('course_id', $id)
                ->pluck('id');
            $passStudent = DetailStudentQuiz::where('quiz_id', $quizActive->id)
                ->where('deatils_student_id', $idSt)
                ->pluck('pass')
                ->first();
        } else if (!empty($lessonPrev)) {
            $parts = explode('/', $lessonPrev->video_link);
            $lessonPrev->video_link = end($parts);
        } else {
            $lessonPrev = DB::table('lessons')->orderBy('order', 'desc')->first();
            $quizActive = DB::table('quizzes')->orderBy('order', 'desc')->first();
            if ($lessonPrev->order < $quizActive->order) {
                $quizActive = null;
                $questions = null;
                $options = null;
                $parts = explode('/', $lessonPrev->video_link);
                $lessonPrev->video_link = end($parts);
            } else {
                $lessonPrev = null;
                $options =  Option::all();
                $questions = DB::table('questions')
                    ->join('quiz_questions', 'quiz_questions.question_id', 'questions.id')
                    ->where('quiz_id', $quizActive->id)
                    ->select('questions.*')
                    ->get();
                $idSt = detailsStudent::where('student_id', $request->input('student_id'))
                    ->where('course_id', $id)
                    ->pluck('id');
                $passStudent = DetailStudentQuiz::where('quiz_id', $quizActive->id)
                    ->where('deatils_student_id', $idSt)
                    ->pluck('pass')
                    ->first();
                $retaking  = DetailStudentQuiz::join('details_students', 'details_students.id', 'detail_student_quizzes.deatils_student_id')
                    ->where('course_id', $id)
                    ->where('student_id', $request->input('student_id'))
                    ->where('quiz_id', $quizActive->id)
                    ->pluck('retaking')
                    ->first();
            }
        }
        $passStudent = $passStudent == null ? 0 : $passStudent;
        $curricula = Curriculum::where('course_id', $id)->get();
        $course = Course::findOrFail($id);
        foreach ($lessonsMix as $key => $lesson) {
            if ($lesson['type'] == 'lesson') {
                $view = DetailStudentLesson::join('details_students', 'details_students.id', 'detail_student_lessons.deatils_student_id')
                    ->where('course_id', $id)
                    ->where('student_id', $request->input('student_id'))
                    ->where('lesson_id', $lesson['id'])
                    ->pluck('view')
                    ->first();
                $lesson['view'] = $view;
            }
            $lessonsMix[$key] = $lesson;
        }
        foreach ($lessonsMix as $key => $lesson) {
            if ($lesson['type'] == 'quiz') {
                $pass = DetailStudentQuiz::join('details_students', 'details_students.id', 'detail_student_quizzes.deatils_student_id')
                    ->where('course_id', $id)
                    ->where('student_id', $request->input('student_id'))
                    ->where('quiz_id', $lesson['id'])
                    ->pluck('pass')
                    ->first();
                $lesson['pass'] = $pass;
            }
            $lessonsMix[$key] = $lesson;
        }

        $retaking === null ? $retaking = 0 : $retaking = $retaking;
        return view('EnglishChallenger.curriculum_list', [
            'lessons' => $lessons,
            'quizzes' => $quizzes,
            'curricula' => $curricula,
            'course' => $course,
            'lessonActive' => $lessonPrev,
            'lessonsMix' => $lessonsMix,
            'options' => $options,
            'questions' => $questions,
            'quizActive' => $quizActive,
            'pass' => $passStudent,
            'retaking' => $retaking
        ]);
    }
    public function checkQuiz(Request $request, int $course)
    {
        if ($request->input('ratake ') == 1) {
            $answers = [];
        }
        $GTest = $request->input('GTest');
        if($GTest == 1){
            // dd($GTest);
            $GTest = true;
        }
        $move = true;
        $retaking = 0;
        $testViewStudent = DetailStudentQuiz::join('details_students', 'details_students.id', 'detail_student_quizzes.deatils_student_id')
            ->where('course_id', $course)
            ->where('student_id', $request->input('student_id'))
            ->where('quiz_id', $request->input('quiz_id'))
            ->select('detail_student_quizzes.*')
            ->first();
        $quiz = Quiz::where('id', $request->input('quiz_id'))->first();

        $pass =  $request->input('grade') >= $quiz->passing_grade ? 1 : 0;
        if (empty($testViewStudent)) {
            $detailsStudent = detailsStudent::where('course_id', $course)
                ->where('student_id', $request->input('student_id'))
                ->first();
            $quiz = Quiz::where('id', $request->input('quiz_id'))->first();
            if ($request->input('grade') >= $quiz->passing_grade) {
                $pass = 1;
            } else {
                $pass = 0;
            }
            DetailStudentQuiz::create(array(
                'grade' => $request->input('grade'),
                'pass' => $pass,
                'retking' => 1,
                'deatils_student_id' => $detailsStudent->id,
                'quiz_id' => $request->input('quiz_id')
            ));
            $retaking = 1;
        } else {
            $retake = $request->input('retake');
            $testViewStudent->update(['grade' => $request->input('grade'), 'pass' => $pass, 'retaking' => $retake == 1 ? $testViewStudent->retaking + 1 : $testViewStudent->retaking]);
            $detailsStudent = detailsStudent::where('course_id', $course)
                ->where('student_id', $request->input('student_id'))
                ->first();
            $retaking = $testViewStudent->retaking;
        }
        $lessons = Lesson::all();
        $quizzes = Quiz::all();

        $quizzesC = Quiz::orderBy('order', 'asc')->get()->toArray();
        $lessonsMix = Lesson::orderBy('order', 'asc')->get()->toArray();
        foreach ($quizzesC as $quiz) {
            $lessonsMix[] = $quiz;
        }
        usort($lessonsMix, function ($a, $b) {
            return $a['order'] <=> $b['order'];
        });
        if ($request->input('type') == 'quiz') {
            $id = $request->input('quiz_id');
            $quizActive = Quiz::where('id', $id)->first();
            $questions = DB::table('questions')
                ->join('quiz_questions', 'quiz_questions.question_id', 'questions.id')
                ->where('quiz_id', $id)
                ->select('questions.*')
                ->get();
            $options = Option::all();
        } else {
            $quizActive = null;
            $questions = null;
            $options = null;
        }
        if ($request->input('type') == 'lesson') {
            $lessonActive = Lesson::where('id', $request->input('quiz_id'))->first();
            $parts = explode('/', $lessonActive->video_link);
            $lessonActive->video_link = end($parts);
        } else {
            $lessonActive = null;
        }

        foreach ($lessonsMix as $key => $lesson) {
            if ($lesson['type'] == 'lesson') {
                $view = DetailStudentLesson::join('details_students', 'details_students.id', 'detail_student_lessons.deatils_student_id')
                    ->where('course_id', $course)
                    ->where('student_id', $request->input('student_id'))
                    ->where('lesson_id', $lesson['id'])
                    ->pluck('view')
                    ->first();
                $lesson['view'] = $view;
            }
            $lessonsMix[$key] = $lesson;
        }
        foreach ($lessonsMix as $key => $lesson) {
            if ($lesson['type'] == 'quiz') {
                $passs = DetailStudentQuiz::join('details_students', 'details_students.id', 'detail_student_quizzes.deatils_student_id')
                    ->where('course_id', $course)
                    ->where('student_id', $request->input('student_id'))
                    ->where('quiz_id', $lesson['id'])
                    ->pluck('pass')
                    ->first();
                $lesson['pass'] = $passs;
            }
            $lessonsMix[$key] = $lesson;
        }
        // dd($lessonsMix);
        $curricula = Curriculum::where('course_id', $course)->get();
        $course = Course::findOrFail($course);
        $answers = json_decode($request->input('answers'));
        // dd($answers);

        return view('EnglishChallenger.curriculum_list', [
            'lessons' => $lessons,
            'quizzes' => $quizzes,
            'curricula' => $curricula,
            'course' => $course,
            'lessonActive' => $lessonActive,
            'lessonsMix' => $lessonsMix,
            'quizActive' => $quizActive,
            'questions' => $questions,
            'options' => $options,
            'grade' => $request->input('grade'),
            'pass' => $pass,
            'answers' => $answers,
            'move' => $move,
            'retaking' => $retaking,
            'GTest'=>$GTest
        ]);
    }
}
