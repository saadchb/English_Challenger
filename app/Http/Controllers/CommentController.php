<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('EnglishChallenger.blog_detail', compact('comments'));
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
    public function store(Request $request , $blog)
    {
        // Create and save the comment
        $comment = new Comment();
        $comment->content = $request->input('msg');
        $comment->website = $request->input('website');
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');

        $blogModel = Blog::findOrFail($blog);
        $comment->blog()->associate($blogModel);

        $comment->save();

        // Redirect back to the blog detail page after adding the comment
        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
