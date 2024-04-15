<?php
namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Book;
use App\Models\Course;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');    
        // Initialize empty arrays for search results
        $schools = [];
        $books = [];
        $courses = [];
    
        if (!empty($searchTerm)) {
            // Search in schools table
            $schools = School::where('school_name', 'like', '%' . $searchTerm . '%')->limit(6)->get();
    
            // Search in books table
            $books = Book::where('title', 'like', '%' . $searchTerm . '%')->limit(6)->get();
    
            // Search in courses table
            $courses = Course::where('title', 'like', '%' . $searchTerm . '%')->limit(6)->get();
        }
      
    $results = collect([
            'schools' => $schools,
            'books' => $books,
            'courses' => $courses,
            'searchTerm' => $searchTerm
        ]); 

            return response()->json($results);
    }

    public function showResults(Request $request)
    {
   
        $searchTerm = $request->input('search2');    
        // Initialize empty arrays for search results
        $schools = [];
        $books = [];
        $courses = [];
    
        if (!empty($searchTerm)) {
            // Search in schools table
            $schools = School::where('school_name', 'like', '%' . $searchTerm . '%')->limit(6)->get();
    
            // Search in books table
            $books = Book::where('title', 'like', '%' . $searchTerm . '%')->limit(6)->get();
    
            // Search in courses table
            $courses = Course::where('title', 'like', '%' . $searchTerm . '%')->limit(6)->get();
        }
      
        // Combine the search results
        $results = collect([
            'schools' => $schools,
            'books' => $books,
            'courses' => $courses,
            'searchTerm' => $searchTerm
        ]);
        // Render the view with the search results
        return view('EnglishChallenger.search-results', compact('results'));
    }
}

