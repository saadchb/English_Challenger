<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search1'))
        {
            $students = Student::where('email',"like", '%' .request('search1').'%')->paginate(8);
        }
        else
        {
            $students = Student::query()->latest()->paginate(8);
        }
     
        return view('Backend_editor.Students.index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend_editor.Students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagePath = $request->file('picture')->store('images','public');
        $student = new Student([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'date_of_birth' => $request->get('date_of_birth'),
            'class' => $request->get('class'),
            'picture' => $imagePath,
        ]);
        $student -> save();
        return redirect()->route('Students.index')->with('success','Student added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('Backend_editor.Students.show',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('Backend_editor.Students.edit',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);
        if ($request->hasFile('picture')) {
            // Store the new image file
            $imagePath = $request->file('picture')->store('images', 'public');
            
            // Update the image path attribute of the Student model
            $student->picture = $imagePath;
        }
    
        // Update other attributes
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->phone = $request->input('phone');
        $student->email = $request->input('email');
        $student->adresse = $request->input('adresse');
        $student->date_of_birth = $request->input('date_of_birth');
        $student->class = $request->input('class');

        // Save the updated model
        $student->save();
    
        return redirect()->route('Students.index')->with('success','Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('Students.index')->with('success','Student deleted successfully.');
    }
}
