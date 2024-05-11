<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Englishchallenger.cart');
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
        // Check if the book already exists in the cart
        $existingCartItem = Cart::where('book_id', $request->input('book_id'))
                                ->where('course_id', $request->input('course_id'))
                                ->first();

        // If the book already exists, do not add it again
        if ($existingCartItem) {
            return redirect()->back()->with('error', 'This book is already in your cart.');
        }

        // If the book doesn't exist in the cart, add it
        $cart = new Cart([
            'book_id' => $request->input('book_id'),
            'course_id' => $request->input('course_id')
        ]);
        $cart->save();

        return redirect()->back()->with('success', 'The book has been added to your cart.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Cart::findOrFail($id);
        $cart ->delete();
        // dd($cart);
        return redirect()->route('EnglishChallenger.cart');
    }
}
