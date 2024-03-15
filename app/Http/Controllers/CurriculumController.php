<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Lesson;
use App\Models\Quiz;
use Illuminate\Http\Request;

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
    public function show(Curriculum $curriculum)
    {
        //
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
        $lessons_quizzes = $request->input('lessons_quizzes');
        foreach ($lessons_quizzes as $item) {
            $it = Lesson::findOrFail($item);
            $it->update(['curriculum_id'=>$id]);
        }
        return redirect()->back();
    }
    public function CQ(Request $request, int $id)
    {
        $lessons_quizzes = $request->input('lessons_quizzes');
        foreach ($lessons_quizzes as $item) {
            $it = Quiz::findOrFail($item);
            $it->update(['curriculum_id'=>$id]);
        }
        return redirect()->back();
    }
}
