<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Lesson;
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
        Curriculum::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $course)
    {
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

        $lessonActive = Lesson::where('id', $request->input('lesson_id'))->first();
        $parts = explode('/', $lessonActive->video_link);
        $lessonActive->video_link = end($parts);
        $curricula = Curriculum::where('course_id', $course)->get();
        $course = Course::findOrFail($course);
        return view('EnglishChallenger.curriculum_list', [
            'lessons' => $lessons,
            'quizzes' => $quizzes,
            'curricula' => $curricula,
            'course' => $course,
            'lessonActive' => $lessonActive,
            'lessonsMix' => $lessonsMix
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
        $lessonsOrderLast = Lesson::where('curriculum_id', $id)->orderBy('order','desc')->pluck('order')->first();
        $quizzesOrderLast = Quiz::where('curriculum_id', $id)->orderBy('order','desc')->pluck('order')->first();
        $nbStart = $lessonsOrderLast;
        if($quizzesOrderLast >$lessonsOrderLast ){
            $nbStart = $quizzesOrderLast;
        }
        $nbStart++;
        $lessons_quizzes = $request->input('lessons_quizzes');
        foreach ($lessons_quizzes as $key => $item) {
            $it = Lesson::findOrFail($item);
            $it->update(['curriculum_id' => $id,'order' =>$key + $nbStart]);
        }
        return redirect()->back();
    }
    public function CQ(Request $request, int $id)
    {
        $lessonsOrderLast = Lesson::where('curriculum_id', $id)->orderBy('order','desc')->pluck('order')->first();
        $quizzesOrderLast = Quiz::where('curriculum_id', $id)->orderBy('order','desc')->pluck('order')->first();
        $nbStart = $lessonsOrderLast;
        if($quizzesOrderLast >$lessonsOrderLast ){
            $nbStart = $quizzesOrderLast;
        }
        $nbStart++;
        $lessons_quizzes = $request->input('lessons_quizzes');
        // dd($lessons_quizzes);
        foreach ($lessons_quizzes as $key =>$item) {
            $it = Quiz::findOrFail($item);
            $it->update(['curriculum_id' => $id,'order'=>$key + $nbStart]);
        }
        return redirect()->back();
    }
    public function next(Request $request, int $id){
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

        $lessonNext = DB::table('lessons')->where('order','>', $request->input('lesson_id'))->orderBy('order', 'desc')->first();
        // dd($lessonNext);
        if(empty($lessonNext)){
        $lessonNext = DB::table('lessons')->orderBy('order','asc')->first();
        }
        $parts = explode('/', $lessonNext->video_link);
        $lessonNext->video_link = end($parts);
        $curricula = Curriculum::where('course_id', $id)->get();
        $course = Course::findOrFail($id);
        return view('EnglishChallenger.curriculum_list', [
            'lessons' => $lessons,
            'quizzes' => $quizzes,
            'curricula' => $curricula,
            'course' => $course,
            'lessonActive' => $lessonNext,
            'lessonsMix' => $lessonsMix
        ]);
    }
    public function prev(Request $request, int $id){
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

        $lessonPrev = DB::table('lessons')
        ->where('order','<', $request->input('lesson_id'))
        ->orderBy('order', 'desc')
        ->first();
        if(empty($lessonPrev)){
            $lessonPrev = DB::table('lessons')
            ->orderBy('order', 'desc')
            ->first();
        }
        $parts = explode('/', $lessonPrev->video_link);
        $lessonPrev->video_link = end($parts);

        $curricula = Curriculum::where('course_id', $id)->get();
        $course = Course::findOrFail($id);
        return view('EnglishChallenger.curriculum_list', [
            'lessons' => $lessons,
            'quizzes' => $quizzes,
            'curricula' => $curricula,
            'course' => $course,
            'lessonActive' => $lessonPrev,
            'lessonsMix' => $lessonsMix
        ]);
    }
}
