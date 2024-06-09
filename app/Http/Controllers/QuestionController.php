<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Option; // Assuming you have a model named 'Option' for the options table

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request('search1')){
            $Questions = Question::where('title',"like","%" .request('search1').'%')->paginate(10);
        }else{
                    $Questions = Question::query()->latest()->paginate(10);

        }
        return view('/Backend_editor/Questions/index',['Questions'=>$Questions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/Backend_editor/Questions/create');
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $question = Question::create([
             'title' => $request->input('title'),
             'description' => $request->input('description'),
             'question_type' => $request->input('question_type'),
             'points' => $request->input('points'),
             'hint' => $request->input('hint'),
         ]);

         // Create options if they are provided in the request
         if ($request->has('options')) {
            foreach ($request->options as $optionData) {
                $question->options()->create([
                    'option_text' => $optionData['option_text'] ?? '',
                    'is_correct' => isset($optionData['is_correct']) ? (bool)$optionData['is_correct'] : false,
                ]);
            }

         }
         return redirect()->route('Questions.index')->with('success', 'Question added successfully');
     }

    // public function store(Request $request)
    // {
    //     // Create the question
    //     $question = Question::create([
    //         'title' => $request->input('title'),
    //         'description' => $request->input('description'),
    //         'question_type' => $request->input('question_type'),
    //         'points' => $request->input('points'),
    //         'hint' => $request->input('hint'),
    //     ]);

    //     if($question->save())
    //     {

    //         $images = $request->file('hob_img');
    //         $hob_desc = $request->hob_desc;

    //         foreach ($request->options as $optionData) {


    //         $options[] = new Option();
    //                     $optionData->hob_name = request('hob_name')[$key];
    //                     $optionData->hob_desc= request('hob_desc')[$key];
    //                     $optionData->hob_img = request($hob_img)[$key];
    //         $options->save();

    //     }
    // }
    //     // // Check if the request has options
    //     // if ($request->has('options')) {
    //     //     foreach ($request->options as $optionData) {
    //     //         // Create an option for the question
    //     //         $option = new Option([
    //     //             'option_text' => $optionData['option_text'],
    //     //             'is_correct' => $optionData['is_correct'],
    //     //         ]);
    //     //         // Associate the option with the question
    //     //         $question->options()->save($option);
    //     //     }
    //     // }

    //     return redirect()->route('Questions.index')->with('success', 'Question Added Successfully');
    // }


    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question =Question::findOrFail($id);
    return view('Backend_editor.Questions.edit',['question'=>$question]);    }

    /**
     * Update the specified resource in storage.
     */

        public function update(Request $request, $id)
{
    $question = Question::findOrFail($id);

    $question->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'question_type' => $request->input('question_type'),
        'points' => $request->input('points'),
        'hint' => $request->input('hint'),
    ]);

    // Update options if they are provided in the request
    if ($request->has('options')) {
        // Delete existing options for the question
        $question->options()->delete();

        // Create new options based on the request
        foreach ($request->options as $optionData) {
            $question->options()->create([
                'option_text' => $optionData['option_text'] ?? '',
                'is_correct' => isset($optionData['is_correct']) ? (bool) $optionData['is_correct'] : false,
            ]);
        }
    }

    return redirect()->route('Questions.index')->with('success', 'Question updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question =Question::findOrFail($id);
        $question->delete();
        return redirect()->route('Questions.index');
    }
}
