<?php

namespace App\Http\Controllers;

use App\Models\Homme;
use Illuminate\Http\Request;

class HommeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featuredVideo = Homme::where('is_active', true)->latest()->first();
        $latestFeaturedId = Homme::where('is_active', true)->latest()->value('id');
        $normalVideos = Homme::where('id', '<>', $latestFeaturedId)->latest()->paginate(3);
        return view('Backend_editor.dachboard', compact('featuredVideo', 'normalVideos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend_editor.dachboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'video' => 'required|string|max:255',
            'is_active' => 'nullable',
        ]);
    
        $video = new Homme([
            'video' => $validatedData['video'],
        ]);

        $video->is_active = $request->has('is_active') ? true : false;
        $video->save();
        

        return redirect()->back()->with('success', 'Video added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Homme $homme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Homme $homme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Homme $homme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Homme $homme)
    {
        //
    }
    public function indexHm(Request $request)
    {
        $featuredVideo = Homme::where('is_active', true)->latest()->first();
        $latestFeaturedId = Homme::where('is_active', true)->latest()->value('id');
        $normalVideos = Homme::where('id', '<>', $latestFeaturedId)->latest()->get();
        return view('EnglishChallenger.index', compact('featuredVideo', 'normalVideos'));
    }
}
