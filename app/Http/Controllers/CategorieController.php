<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Categorie;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        $tags = Tag::all();
        return view('Backend_editor.courses.categories.index',['categories' => $categories, 'tags' => $tags]);
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
        $validatedData = $request->validate([
            'title' => 'required|unique:categories|max:255',
        ]);
        Categorie::create($validatedData);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)

    {
        $cartBooks = Cart::pluck('book_id')->toArray();
        $currentCategoryId = $id;
        $categorie=Categorie::findOrFail($id);        
        return view('EnglishChallenger.categorie', [
             'categorie' => $categorie,
             'currentCategoryId'=>$currentCategoryId,
            'cartBooks'=>$cartBooks
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie=Categorie::findOrfail($id);
        $categorie->delete();
        return redirect()->route('Categories.index');
    }
}
