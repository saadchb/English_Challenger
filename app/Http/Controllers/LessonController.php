<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course; // Import the Course model
use App\Http\Requests\LessonRequest;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

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
            $teacherId = Auth::guard('teacher')->user()->id;
            $isAdmin = Auth::guard('teacher')->user()->isAdmin;
            
            $lessons = Lesson::query()
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
        'duration_unit' => $request->input('duration_unit'),
        'priview' => $priview, // Assign converted boolean value
        'video_link' => $request->input('video_link'),
        'teacher_id' => $request->input('teacher_id')

        // 'course_id' => $request->input('course_id'),
    ]);

    // Save the lesson
    $lesson->save();

    return to_route('lessons.index');
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
        if (Auth::guard('teacher')->user()->id !== $lesson->teacher_id and Auth::guard('teacher')->user()->isAdmin !== 1) {
            abort(403);
        }
        return view('Backend_editor.lessons.edit',['lesson'=>$lesson]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LessonRequest $request, Lesson $lesson)
    {
        if (Auth::guard('teacher')->user()->id !== $lesson->teacher_id and Auth::guard('teacher')->user()->isAdmin !== 1) {
            abort(403);
        }
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



