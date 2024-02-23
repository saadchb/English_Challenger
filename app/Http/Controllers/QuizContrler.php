<?php

// app/Http/Controllers/QuizController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;

class QuizController extends Controller
{
    public function saveQuiz(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'questions.*.questionText' => 'required|string',
            'questions.*.questionType' => 'required|in:true_false,multi_choice,single_choice',
            // Add other validation rules...
        ]);

        // Save quiz data
        $quiz = new Quiz([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            // Add other quiz fields...
        ]);
        $quiz->save();

        // Save each question
        foreach ($request->input('questions') as $questionData) {
            $question = new Question([
                'quiz_id' => $quiz->id,
                'question_text' => $questionData['questionText'],
                'question_type' => $questionData['questionType'],
                // Add other question fields...
            ]);
            $question->save();
        }

        return response()->json(['message' => 'Quiz saved successfully']);
    }
}
