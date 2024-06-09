<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categorie;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $latestBlogs = Blog::latest()->take(5)->get();
        $categories = Categorie::all();
        $tags = Tag::all();
        $blogs = Blog::where('title', 'like', "%$query%")->paginate(3);
        return view('EnglishChallenger.blog_list', compact('blogs', 'latestBlogs', 'categories', 'tags'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::pluck('title', 'id');
        return view('Backend_editor.Blogs.create',['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagePath = $request->file('img')->store('images','public');

        $blog = new Blog([
            'title' => $request->get('title'),
            'subtitle' => $request->get('subtitle'),
            'description' => $request->get('description'),
            'content' => $request->get('content'),
            'subcontent' => $request->get('subcontent'),
            'tag_id' => $request->get('tag_id'),
            'teacher_id' => $request->get('teacher_id'),
            'img' => $imagePath,
        ]);
        $blog -> save();
        return redirect()->route('Bloges.index')->with('success','Blog added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request ,$id)
    {
        $query = $request->input('query');
        $latestBlogs = Blog::latest()->take(5)->get();
        $categories = Categorie::all();
        $tags = Tag::all();
        $blogs = Blog::where('title', 'like', "%$query%")->paginate(3);
        $blog = Blog::findOrFail($id);
        $comments = Comment::where('blog_id', $id)->get();
        return view('EnglishChallenger.blog_detail', compact('blog','blogs','tags','categories','latestBlogs', 'comments'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if (Auth::guard('teacher')->user()->id !== $blog->teacher_id and Auth::guard('teacher')->user()->isAdmin !== 1) {
            abort(403);
        }
        $tags = Tag::pluck('title', 'id');
        return view('Backend_editor.Blogs.edit',['tags' => $tags , 'blog'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        if ($request->hasFile('img')) {
            // Store the new image file
            $imagePath = $request->file('img')->store('images', 'public');
            
            // Update the image path attribute of the Blog model
            $blog->img = $imagePath;
        }
    
        // Update other attributes
        $blog->title = $request->input('title');
        $blog->subtitle = $request->input('subtitle');
        $blog->content = $request->input('content');
        $blog->subcontent = $request->input('subcontent');
        $blog->description = $request->input('description');
        $blog->tag_id = $request->input('tag_id');

        // Save the updated model
        $blog->save();
    
        return redirect()->route('Bloges.index')->with('success','Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('Bloges.index')->with('success', 'Blog deleted successfully.');
    }


    public function indexBl(Request $request)
    {
        $latestBlogs = Blog::latest()->take(5)->get();
        $categories = Categorie::all();
        $tags = Tag::all();
        if (request('search1'))
        {
            $blogs = Blog::where('title',"like", '%' .request('search1').'%')->paginate(8);
        }
        else
        {
            $teacherId = Auth::guard('teacher')->user()->id;
            $isAdmin = Auth::guard('teacher')->user()->isAdmin;
            
            $blogs = Blog::query()
                ->where(function ($query) use ($teacherId, $isAdmin) {
                    if ($isAdmin == 1) {
                        // If the user is an admin, get all lessons
                        $query->orWhere('teacher_id', '!=', null);
                    } else {
                        // If the user is not an admin, get only their lessons
                        $query->orWhere('teacher_id', $teacherId);
                    }
                })
                ->latest()
                ->paginate(8);
        }
        return view('Backend_editor.Blogs.index', compact('blogs', 'latestBlogs', 'categories', 'tags'));
    }

    public function showBl(Request $request ,$id)
    {
        $query = $request->input('query');
        $latestBlogs = Blog::latest()->take(5)->get();
        $categories = Categorie::all();
        $tags = Tag::all();
        $blogs = Blog::where('title', 'like', "%$query%")->paginate(3);
        $blog = Blog::findOrFail($id);
        $comments = Comment::where('blog_id', $id)->get();
        return view('Backend_editor.Blogs.show', compact('blog','blogs','tags','categories','latestBlogs', 'comments'));
    }
}
