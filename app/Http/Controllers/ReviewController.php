<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Requests\SchoolRequest;
use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews= review::all();
        return view('EnglishChallenger.index',['reviews'=>$reviews]);
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
    public function store(ReviewRequest $request)
    {
        
        

        $imagePath = null;
        $rating = $request->get('rating');
        if(empty($rating)){
            $rating = 0.5;
        }

        if ($request->hasFile('school_photos')) {
            // Store the new image file
            $imagePath = $request->file('school_photos')->store('images', 'public');
        }
            $reviews = new review([
            'comments' => $request->get('comments'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'siteweb' => $request->get('siteweb'),
            'school_photos' => $imagePath,
            'school_id' => $request->get('school_id'),
            'book_id' => $request->get('book_id'),
            'course_id' => $request->get('course_id'),


            'rating' =>$rating,
        ]);
        // dd($reviews);
        $reviews ->save();
        return redirect()->back();
    }
    

    /**
     * Display the specified resource.
     */
    public function show(review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(review $review)
    {
        //
    }
}
