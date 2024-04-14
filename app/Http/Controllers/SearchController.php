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
            $schools = School::where('school_name', 'like', '%' . $searchTerm . '%')->get();
    
            // Search in books table
            $books = Book::where('title', 'like', '%' . $searchTerm . '%')->get();
    
            // Search in courses table
            $courses = Course::where('title', 'like', '%' . $searchTerm . '%')->get();
        }
    
        // Combine the search results
        $results = collect([
            'schools' => $schools,
            'books' => $books,
            'courses' => $courses,
            'searchTerm' => $searchTerm
        ]);
    
        return view('EnglishChallenger.search-results', compact('results'));
    }
    
}
