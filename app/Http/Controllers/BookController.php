<?php

namespace App\Http\Controllers;

use App\Http\Requests\bookRequest;
use App\Models\Book;
use App\Models\Categorie;
use App\Models\CategoriesBooks;
use App\Models\review;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search1')) {
            $books = book::where('title', "like", '%' . request('search1') . '%')->paginate(8);
        } else {
            $books = book::query()->latest()->paginate(8);
        }
        $categories = Categorie::join('categories_books', 'categories.id', '=', 'categories_books.categorie_id')->get();

        return view('Backend_editor.books.index', ['books' => $books, 'categories' => $categories]);
    }
    public function E_Library(Request $request)
    {
        if (request('search1')) {
            $books = Book::where('title', "like", '%' . request('search1') . '%')->paginate(8);
        } else {
            $books = Book::query()->latest()->paginate(8);
        }
        $orderBy = $request->input('orderby');

        // Perform sorting based on the selected option
        if ($orderBy === 'popularity') {
            // Sort by popularity logic
        } elseif ($orderBy === 'rating') {
            // Sort by average rating logic
        } elseif ($orderBy === 'latest') {
            // Sort by latest logic
        } elseif ($orderBy === 'price_low_high') {
            // Sort by price: low to high logic
        } elseif ($orderBy === 'price_high_low') {
            // Sort by price: high to low logic
        } else {
            // Default sorting logic
        }

        $reviews = review::all();
        
        $categories = Categorie::join('categories_books', 'categories.id', '=', 'categories_books.categorie_id')->get();

        return view('EnglishChallenger.E_library', ['books' => $books, 'reviews' => $reviews, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('Backend_editor.books.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $imagePath = $request->file('img')->store('images', 'public');

        $file = $request->file('file_path');
        $filePath = $file->store('pdfs', 'public');

        $book = new Book([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'sale_price' => $request->input('sale_price'),
            'regular_price' => $request->input('regular_price'),
            'img' => $imagePath,
            'file_path' => $filePath
        ]);

        // Check if sale_price is greater than regular_price
        if ($book->sale_price > $book->regular_price) {
            $book->sale_price = 0;
        }
        // dd($book);
        $book->save();
        $id = $book->id;

        // Get categories from the request
        $categories = $request->input('categories');

        // Check if categories exist
        if (!empty($categories)) {
            // Create CategoriesBooks records for each category
            foreach ($categories as $category) {
                CategoriesBooks::create([
                    'book_id' => $id, // Assuming the foreign key is book_id, adjust if necessary
                    'categorie_id' => $category
                ]);
            }
        }

        return redirect()->route('books.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Categorie::all();
        return view('Backend_editor.books.edit', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(bookRequest $request, $id)
    {

        // Find the book by id
        $book = Book::findOrFail($id);

        // Update book attributes
        $book->title = $request['title'];
        $book->description = $request['description'];
        $book->sale_price = $request['sale_price'] ?? 0;
        $book->regular_price = $request['regular_price'];

        // Update image file if provided
        if ($request->hasFile('img')) {
            // Delete old image
            Storage::disk('public')->delete($book->img);
            // Store new image
            $imagePath = $request->file('img')->store('images', 'public');
            $book->img = $imagePath;
        }

        // Update PDF file if provided
        if ($request->hasFile('file_path')) {
            // Delete old PDF file
            Storage::disk('public')->delete($book->file_path);
            // Store new PDF file
            $file = $request->file('file_path');
            $filePath = $file->store('pdfs', 'public');
            $book->file_path = $filePath;
        }
        // Save the updated book
        $book->save();

        // Retrieve categories from the request
        $categories = $request->input('categories');

        if ($categories) {
            CategoriesBooks::where('book_id', $id)->delete();
            foreach ($categories as $categorie) {
                CategoriesBooks::create(array(
                    'book_id' => $id,
                    'categorie_id' => $categorie
                ));
            }
        }

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrfail($id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
