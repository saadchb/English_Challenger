<?php

namespace App\Http\Controllers;

use App\Http\Requests\bookRequest;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Categorie;
use App\Models\categories_books;
use App\Models\CategoriesBooks;
use App\Models\CategoriesCourse;
use App\Models\review;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search1')) {
            $books = book::where('title', "like", '%' . request('search1') . '%')->paginate(6);
        } else {
            $books = book::query()->latest()->paginate(6);
        }
        $categories = Categorie::join('categories_books', 'categories.id', '=', 'categories_books.categorie_id')->get();

        return view('Backend_editor.books.index', ['books' => $books, 'categories' => $categories]);
    }

    public function E_Library(Request $request)
    {
        // Fetch all books or apply search filter
        $booksQuery = Book::query();

        if ($request->filled('search1')) {
            $booksQuery->where('title', 'like', '%' . $request->input('search1') . '%');
        }

        // Applying price range filter
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $minPrice = (float) $request->input('min_price');
            $maxPrice = (float) $request->input('max_price');

            $booksQuery->whereBetween('regular_price', [$minPrice, $maxPrice]);
        }
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
                case 'default':
                    // For the default sorting option, either apply default sorting logic
                    // or return unsorted results. Adjust this based on your application's needs.
                    // For example:
                    $booksQuery->orderBy('id', 'asc'); // Sort by book ID in ascending order
                    break;
            }
        }
        $minPrice = 0;
        $maxPrice = 1000;

        // Applying price range filter
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $minPrice = (float) $request->input('min_price');
            $maxPrice = (float) $request->input('max_price');

            $booksQuery->whereBetween('regular_price', [$minPrice, $maxPrice]);
        }
        $books = $booksQuery->paginate(8);

        // Fetch reviews and categories
        $reviews = Review::all();

        $categorys = categories_books::distinct('categorie_id')->pluck('categorie_id')->toArray();
        $categories = Categorie::whereIn('id', $categorys)->get();
        foreach ($categories as $category) {
            $category->books_count = categories_books::where('categorie_id', $category->id)->count();
        }
        $cartBooks = Cart::pluck('book_id')->toArray();

        // Pass data to the view including $minPrice and $maxPrice
        return view('EnglishChallenger.E_library', [
            'books' => $books,
            'reviews' => $reviews,
            'cartBooks' => $cartBooks,
            'categories' => $categories,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
        ]);
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
    public function store(bookRequest $request)
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
                categories_books::create([
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
    public function show(string $id)
    {

        $book = Book::findOrFail($id);
        $cartBooks = Cart::pluck('book_id')->toArray();

        // Get the category ID of the specific book
        $category_ids = categories_books::where('book_id', $id)->pluck('categorie_id')->toArray();

        // Get all books that belong to the same categories
        $categories_books = Book::whereIn('id', function ($query) use ($category_ids) {
            $query->select('book_id')
                ->from('categories_books')
                ->whereIn('categorie_id', $category_ids);
        })->get();

        $categorys = categories_books::distinct('categorie_id')->pluck('categorie_id')->toArray();
        $categories = Categorie::whereIn('id', $categorys)->get();
        foreach ($categories as $category) {
            $category->books_count = categories_books::where('categorie_id', $category->id)->count();
        }
        $currentCategoryId = $id;
        $review = review::all();
        return view('EnglishChallenger.book', [
            'book' => $book,
            'categories_books' => $categories_books,
            'categories' => $categories, 'currentCategoryId' => $currentCategoryId,
            'review' => $review,
            'cartBooks' => $cartBooks
        ]);
    }


    public function certifcat()
    {

        $categorys = categories_books::distinct('categorie_id')->pluck('categorie_id')->toArray();
        $categories = Categorie::whereIn('id', $categorys)->get();
        foreach ($categories as $category) {
            $category->course_count = CategoriesCourse::where('categorie_id', $category->id)->count();
        }

        $tags  = Tag::all();
        return view('EnglishChallenger.page-certifcate', [
            'categories' => $categories,
            'tags' => $tags
        ]);
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
            // Store the new image file
            $imagePath = $request->file('img')->store('images', 'public');

            // Update the image path attribute of the famille model
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
            categories_books::where('book_id', $id)->delete();
            foreach ($categories as $categorie) {
                categories_books::create(array(
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
