<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Models\Homme;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

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
    public function store(VideoRequest $request)
    {


                    $imagePath = $request->file('videoImport')->store('videos', 'public');
        
                    $video = new Homme([
                        'videoImport' => $imagePath,
                    ]);
        $video->is_active = $request->has('is_active') ? true : false;
        // dd($video);

        $video->save();
    // }


        return redirect()->back()->with('success', 'Video added successfully.');
    }
    // public function store(Request $request)
    // {

    //     // $this->validate($request,[
    //     //     'subject'=> 'required',
    //     //     'class'=> 'required',
    //     //     'topic'=> 'required',
    //     //     'slide'=> 'required|mimes:mp4,ppx,pdf,ogv,jpg,webm|max:1999',


    //     // ]);
    //     dd($request);

    //     if ($request->hasFile('video_import')) {
    //         $filenameWithExt = $request->file('video_import')->getClientOriginalName();
    //         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    //         $extension = $request->file('video_import')->getClientOriginalExtension();
    //         $fileNameToStore = $filename . '_' . time() . '.' . $extension;
    //         $path = $request->file('video_import')->storeAs('public/videos/', $fileNameToStore);
    //     } else {
    //         $fileNameToStore = 'noimage.jpg';
    //     }
    //     $video = new Homme();
    //     $video->video_import = $request->input('video_import');
    //     $slidefile = $fileNameToStore;
    //     $video->is_active = $request->has('is_active') ? true : false;
    //     $video->save();
    //     return back()->with('success', ' Upload Successfull');
    // }

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
