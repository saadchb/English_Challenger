<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Book;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
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
        if (request('search1')) {
            $teachers = Teacher::query()->where('first_name', "like", '%' . request('search1') . '%')
                ->orWhere('last_name', "like", '%' . request('search1') . '%')
                ->paginate(10);
        } else {
            $teachers = Teacher::query()->paginate(10);
        }
        return view('Backend_editor.teachers.index', ['teachers' => $teachers]);
    }
    public function become_teacher()
    {
        return view('EnglishChallenger.BecomeTeacher');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend_editor.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($request->hasFile('picture')) {
            $data['picture']  = $request->file('picture')->store('imagesTeachers', 'public');
        }

        if ($request->hasFile('cv')) {
            $data['cv']  = $request->file('cv')->store('CVTeachers', 'public');
        }
        $hashedPassword = Hash::make($request->password);
        $data['password'] = $hashedPassword;

        Teacher::create($data);
        return redirect()->route('EnglishChallenger.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('Backend_editor.profile', compact('teacher'));
    }

    public function show_teacher(string $id)
    {
        // $Courses = Course::Where('books.teacher_id','like',$id)->count();
        $Books = Book::Where('books.teacher_id','like',$id)->count();
        $Students = Student::Where('students.teacher_id','like',$id)->count();
        $Blogs = Blog::Where('blogs.teacher_id','like',$id)->count();
        $courses = Course::Where('teacher_id',$id)->count();

        $teacher = Teacher::findOrFail($id);
        return view('Backend_editor.teachers.show', compact('teacher','Blogs','Books','Students','courses'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher, string $id)
    {
        // Validate TEA$teacher input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'picture' => 'image|mimes:jpeg,png,jpg,gif', // Assuming image upload
        ]);

        // Find the TEA$teacher by ID
        $teacher = Teacher::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('picture')) {
            $imagePath = $request->file('picture')->store('images', 'public');
            $teacher->picture = $imagePath;
        }

        // Update teacher attributes
        $teacher->first_name = $request->input('first_name');
        $teacher->last_name = $request->input('last_name');
        $teacher->city = $request->input('city');
        $teacher->phone = $request->input('phone');
        $teacher->email = $request->input('email');

        // Check if password is being updated and hash it
        // if ($request->filled('password')) {
        //     $teacher->password = Hash::make($request->input('password'));
        // }
        // dd($teacher);
        // Save the updated teacher
        $teacher->save();
        return back()->with('success', 'succes');
    }

    public function changePassword(Request $request, $id)
    {
        // Validate the request data
        // $request->validate([
        //     'current_password' => 'required',
        //     'new_password' => 'required|string|min:8|confirmed',
        // ]);

        // Find the TEA$teacher by ID
        $teacher = Teacher::findOrFail($id);

        // Verify the current password
        if (!Hash::check($request->current_password, $teacher->password)) {
            return back()->with('error', 'The current password is incorrect.');
        }

        // Update the password
        $teacher->password = Hash::make($request->new_password);
        // dd($teacher);
        $teacher->save();

        // Redirect back with a success message
        return back()->with('success', 'Password changed successfully.');
    }


    /**
     * make the specified teacher refused.
     */
    public function refuse_tacher(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update(['isAdmin' => -1]);
        return redirect()->back()->with('success', 'Teacher status updated successfully.');
    }
    public function remove_teacher(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return  to_route('Teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        Session::flush();
        Auth::logout();
        return  to_route('login');
    }
}
