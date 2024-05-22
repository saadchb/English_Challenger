<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\quiz_question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request('search1')){
            $Quizs = Quiz::where('title',"like","%" .request('search1').'%')->paginate(10);
        }else{
            $teacherId = Auth::guard('teacher')->user()->id;
            $isAdmin = Auth::guard('teacher')->user()->isAdmin;
            
            $Quizs = Quiz::query()
            ->where(function ($query) use ($teacherId, $isAdmin) {
                if ($isAdmin == 1) {
                    // If the user is an admin, get all lessons
                    $query->orWhere('teacher_id', '!=', null);
                } else {
                    // If the user is not an admin, get only their lessons
                    $query->orWhere('teacher_id', $teacherId);
                }
            })
            ->latest()
            ->paginate(8);

        }
        return view('Backend_editor.Quizzes.index',['Quizs'=>$Quizs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $questions = Question::pluck('title', 'id','question_type');
        return view('Backend_editor.Quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $priview = $request->has('review');
        $show = $request->has('show_correct_answer');
        $CHECK = $request->has('instant_check');
        $general_test = $request->has('general_test');

        $Quiz = new Quiz([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'duration' => $request->get('duration'),
            'duration_unit' => $request->get('duration_unit'),
            'passing_grade' => $request->get('passing_grade'),
            'instant_check' => $CHECK,
            'negative_marking' => $request->get('negative_marking'),
            'minus_for_skip' => $request->get('minus_for_skip'),
            'teacher_id' => $request->get('teacher_id'),
            'retake' => $request->get('retake'),
            'pagination' => $request->get('pagination'),
            'review' => $priview,
            'general_test' => $general_test,
            'show_correct_answer' => $show,

        ]);

        $Quiz->save();

        $selectedQuestions = $request->input('questions');
        if (!empty($selectedQuestions)) {
            foreach ($selectedQuestions as $questionId) {
                quiz_question::create([
                    'quiz_id' => $Quiz->id,
                    'question_id' => $questionId
                ]);
            }
        }
        return redirect()->route('Quizzes.index')->with('success', 'Lesson succesfuly added');

    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quiz =Quiz::findOrFail($id);
        if (Auth::guard('teacher')->user()->id !== $quiz->teacher_id and Auth::guard('teacher')->user()->isAdmin !== 1) {
            abort(403);
        }
    return view('Backend_editor.Quizzes.edit',['quiz'=>$quiz]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $quiz = Quiz::findOrFail($id);
        if (Auth::guard('teacher')->user()->id !== $quiz->teacher_id and Auth::guard('teacher')->user()->isAdmin !== 1) {
            abort(403);
        }
    
        $priview = $request->has('review');
        $show = $request->has('show_correct_answer');
        $CHECK = $request->has('instant_check');
        $general_test = $request->has('general_test');



        // Update the attributes of the existing quiz
        $quiz->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'duration' => $request->input('duration'),
            'duration_unit' => $request->input('duration_unit'),
            'passing_grade' => $request->input('passing_grade'),
            'instant_check' => $CHECK,
            'negative_marking' => $request->input('negative_marking'),
            'minus_for_skip' => $request->input('minus_for_skip'),
            'retake' => $request->input('retake'),
            'pagination' => $request->input('pagination'),
            'review' => $priview,
            'general_test' => $general_test,
            'show_correct_answer' => $show,
        ]);

        // Update the associated questions (detach and reattach)
        $selectedQuestions = $request->input('questions');
        $quiz->questions()->detach();
        if (!empty($selectedQuestions)) {
            foreach ($selectedQuestions as $questionId) {
                quiz_question::create([
                    'quiz_id' => $quiz->id,
                    'question_id' => $questionId
                ]);
            }
        }

        return redirect()->route('Quizzes.index')->with('success', 'Quize updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quiz=Quiz::findOrFail($id);
        $quiz ->delete();
        return  redirect()->route('Quizzes.index');

    }
}
