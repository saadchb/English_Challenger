<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course; // Import the Course model
use App\Http\Requests\LessonRequest;


class LessonController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search1'))
        {
            $lessons = Lesson::where('title',"like", '%' .request('search1').'%')->paginate(8);
        }
        else
        {
            $lessons = Lesson::query()->latest()->paginate(8);
        }
        return view('Backend_editor/lessons.index',['lessons' => $lessons]);
       }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend_editor.lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Store method in LessonController
public function store(LessonRequest $request)
{
    // Convert 'priview' value to boolean
    $priview = $request->has('priview');

    // Find the course by its ID to ensure it exists
    // $course = Course::findOrFail($request->input('course_id'));

    // Create a new Lesson instance with the provided data
    $lesson = new Lesson([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'duration' => $request->input('duration'),
        'priview' => $priview, // Assign converted boolean value

        // 'course_id' => $request->input('course_id'),
    ]);

    // Save the lesson
    $lesson->save();

    return redirect()->route('lessons.index')->with('success', 'Lesson ajoutée avec succès');
}


    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        return view('Backend_editor.lessons.edit',['lesson'=>$lesson]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LessonRequest $request, Lesson $lesson)
    {
    $request->merge(['priview' => $request->has('priview')]); // Convert checkbox value to boolean

    $lesson->update($request->all());

    return redirect()->back();
    }
/*        $school->adresse = $request->input('adresse');
        $school->description = $request->input('description');

        // Save the updated model
        $school->save();
         */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        // dd($lesson);
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();
        return redirect()->back();
    }
}



