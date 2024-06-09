<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Mail\teacherMail;
use App\Models\review;
use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function __construct()
    // {
    //     // $this->middleware('auth')->except('store');
    // }
    public function index()
    {
        if (request('search1')) {
            $schools = School::where('school_name', "like", '%' . request('search1') . '%')
            ->orWhere('school_city', "like", '%' . request('search1') . '%')
            ->paginate(8);

        } else {
            $schools = School::query()->latest()->paginate(8);
        }

        return view('Backend_editor.Schools.index', ['schools' => $schools]);
    }


    public function schools_list(Request $request)
    {
        $schoolsQuery = School::query();

        if ($request->filled('search1')) {
            $schoolsQuery->where('school_name', 'like', '%' . $request->input('search1') . '%')
            ->orWhere('school_city', "like", '%' . request('search1') . '%');
        }
        // Applying sorting based on the selected option
        if ($request->filled('orderby')) {
            switch ($request->input('orderby')) {
                case 'rating':
                    // Join with reviews table and calculate average rating
                    $schoolsQuery->leftJoin('reviews', 'schools.id', '=', 'reviews.school_id')
                        ->select('schools.*', DB::raw('AVG(reviews.rating) as average_rating'))
                        ->groupBy('schools.id')
                        ->orderByDesc('average_rating');
                    break;

                case 'latest':
                    $schoolsQuery->latest();
                    break;

                case 'default':
                    // For the default sorting option, either apply default sorting logic
                    // or return unsorted results. Adjust this based on your application's needs.
                    // For example:
                    $schoolsQuery->orderBy('id', 'asc'); // Sort by book ID in ascending order
                    break;
            }
             }
            //  Mail::to('chbsaad111@gmail.com')->send(new teacherMail($schoolsQuery));

        $schools = Cache::remember('schools',10,function(){
            return School::paginate(8);
        });
        return view('EnglishChallenger.Schools_list', [
            'schools' => $schools
        ]);
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

        $imagePath = $request->file('school_logo')->store('images', 'public');
        $photoPath = $request->file('school_photo')->store('images', 'public');

        $school = new School([
            'school_name' => $request->get('school_name'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'name_headmaster' => $request->get('name_headmaster'),
            'phone_number_headmaster' => $request->get('phone_number_headmaster'),
            'school_city' => $request->get('school_city'),
            'adresse' => $request->get('adresse'),
            'description' => $request->get('description'),
            'school_photo' => $photoPath,
            'type' => $request->get('type'),
            'school_logo' => $imagePath,
        ]);

        if (isset($request->fromRegister)) {
            return redirect('/');
        } else {
            return redirect()->back()->with('success', 'School ajoutée avec succès');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $school = School::findOrFail($id);
        return view('Backend_editor.Schools.show', ['school' => $school]);
    }
    public function show_School(string $id)
    {
        $reviews = review::where('school_id', $id)->latest()->paginate(9); // Fetch reviews for the specific book
        $teachers = Teacher::all();
        $studentR = Student::all();

        $school = School::findOrFail($id);
        return view('EnglishChallenger.school', compact('teachers','studentR','school','reviews'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $school = School::findOrFail($id);
        return view('Backend_editor.Schools.edit', ['school' => $school]);
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
        if ($request->hasFile('school_photo')) {
            // Store the new image file
            $photoPath = $request->file('school_photo')->store('images', 'public');

            // Update the image path attribute of the famille model
            $school->school_photo = $photoPath;
        }

        // Update other attributes
        $school->school_name = $request->input('school_name');
        $school->school_name = $request->input('type');
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
        $school = School::findOrFail($id);
        $school->delete();
        return redirect()->route(('Schools.index'));
    }
}
