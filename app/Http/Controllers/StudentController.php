<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth.teacherAdmin')->except('store');
    }
    public function index()
    {
        if (request('search1'))
        {
            $students = Student::where('first_name',"like", '%' .request('search1').'%')->paginate(8);
        }
        else
        {
            $students = Student::query()->latest()->paginate(7);
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
        if(isset($request->fromRegister)) {
          
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example: max size of 2MB
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|string|email|unique:students,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }else {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',        
            'email' => 'required|string|email|unique:students,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

        $data['password'] = Hash::make($request->password);
        if($request->hasFile('picture')){
            $data['picture'] = $request->file('picture')->store('imagesStudents','public');
        }   
            $data['teacher_id'] = $request->get('teacher_id');        
        
        // dd($data);
        Student::create($data);
        if(isset($request->fromRegister)) {
            return redirect()->route('selection')->with('success','Student added successfully.');
        }else{
            return redirect()->route('Students.index')->with('success','Student added successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student= Student::findOrFail($id);
        return view('Backend_editor.Students.show',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {
        $student=Student::findOrFail($id);
        if(Auth::guard('teacher')->user()->id !== $student->teacher_id and Auth::guard('teacher')->user()->isAdmin !== 1){
            abort(403);
        }
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
        $student->address = $request->input('address');
        $student->date_of_birth = $request->input('date_of_birth');
        // $student->class = $request->input('class');

        // Save the updated model
        $student->save();
        return redirect()->route('Students.index')->with('success','Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student=Student::findOrfail($id);
        $student->delete();
        return redirect()->route('Students.index')->with('success','Student deleted successfully.');
    }
}
