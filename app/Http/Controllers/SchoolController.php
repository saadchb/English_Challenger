<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search1'))
        {
            $schools = School::where('school_name',"like", '%' .request('search1').'%')->paginate(8);
        }
        else
        {
            $schools = School::query()->latest()->paginate(8);
        }
     
        return view('Backend_editor.Schools.index',['schools'=>$schools]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend_editor.Schools.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $imagePath = $request->file('school_logo')->store('images','public');
        $school = new School([
            'school_name' => $request->get('school_name'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'name_headmaster' => $request->get('name_headmaster'),
            'phone_number_headmaster' => $request->get('phone_number_headmaster'),
            'school_city' => $request->get('school_city'),
            'adresse' => $request->get('adresse'),
            'description' => $request->get('description'),
            'school_logo' => $imagePath,
        ]);
        $school -> save();
        return redirect()->route('Schools.index')->with('success','school Ajouteé avec succés');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $school=School::findOrFail($id);
        return view('Backend_editor.Schools.show',['school'=>$school]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $school = School::findOrFail($id);
        return view('Backend_editor.Schools.edit',['school'=>$school]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)

    {
        $school = School::findOrFail($id);
        if ($request->hasFile('school_logo')) {
            // Store the new image file
            $imagePath = $request->file('school_logo')->store('images', 'public');
            
            // Update the image path attribute of the famille model
            $school->school_logo = $imagePath;
        }
    
        // Update other attributes
        $school->school_name = $request->input('school_name');
        $school->phone_number = $request->input('phone_number');
        $school->email = $request->input('email');
        $school->name_headmaster = $request->input('name_headmaster');
        $school->phone_number_headmaster = $request->input('phone_number_headmaster');
        $school->school_city = $request->input('school_city');
        $school->adresse = $request->input('adresse');
        $school->description = $request->input('description');
        
        // Save the updated model
        $school->save();
    
        return redirect()->route('Schools.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $school =School::findOrFail($id);
        $school->delete();
        return redirect()->route(('Schools.index'));
  
    }
}
