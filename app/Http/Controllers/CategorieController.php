<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Categorie;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function show(Request $request, string $id)
    {
        $booksQuery = Book::query();        
    
        // Applying sorting based on the selected option
        if ($request->filled('orderby')) {
            switch ($request->input('orderby')) {
                case 'rating':
                    // Join with reviews table and calculate average rating
                    $booksQuery->leftJoin('reviews', 'books.id', '=', 'reviews.book_id')
                               ->select('books.id', 'books.title', 'books.regular_price', DB::raw('AVG(reviews.rating) as average_rating'))
                               ->groupBy('books.id', 'books.title', 'books.regular_price')
                               ->orderBy('average_rating', 'desc');
                    break;
                
                case 'latest':
                    $booksQuery->latest();
                    break;
                case 'price_low_high':
                    $booksQuery->orderBy('regular_price', 'asc');
                    break;
                case 'price_high_low':
                    $booksQuery->orderBy('regular_price', 'desc');
                    break;
                default:
                    // For the default sorting option, either apply default sorting logic
                    // or return unsorted results. Adjust this based on your application's needs.
                    $booksQuery->orderBy('id', 'asc'); // Sort by book ID in ascending order
                    break;
            }
        }
    
        // Applying price range filter
        $minPrice = 0;
        $maxPrice = 1000;
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $minPrice = (float) $request->input('min_price');
            $maxPrice = (float) $request->input('max_price');
            
            $booksQuery->whereBetween('regular_price', [$minPrice, $maxPrice]);
        }
    
        // Paginate the results after applying sorting and filtering
        $books = $booksQuery->paginate(8);
    
        $cartBooks = Cart::pluck('book_id')->toArray();
        $currentCategoryId = $id;
        $categorie = Categorie::findOrFail($id);
    
        return view('EnglishChallenger.categorie', [
            'categorie' => $categorie,
            'currentCategoryId' => $currentCategoryId,
            'cartBooks' => $cartBooks,
            'books' => $books, // Pass paginated books to the view
            'minPrice' => $minPrice, // Pass minPrice and maxPrice for filtering UI
            'maxPrice' => $maxPrice,
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
