<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('EnglishChallenger.BecomeTeacher');
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
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if($request->hasFile('picture')){
            $data['picture']  = $request->file('picture')->store('imagesTeachers','public');
        }

        if($request->hasFile('cv')){
            $data['cv']  = $request->file('cv')->store('CVTeachers','public');
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
