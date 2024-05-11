<?php

namespace App\Livewire;

use App\Models\Book;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddToCart extends Component
{
    public $cartBooks = array();
    public $book = array();
    public function AddToCart($book){
        $book = Book::findOrFail($book);
        $bookAded['name'] = $book->title;
        $bookAded['qty'] = 1;
        if (!empty($book->regular_price)) {
            if (!empty($book->sale_price)) {
                $bookAded['price'] = $book->sale_price;
            } else {
                $bookAded['price'] = $book->regular_price;
            }
        } else {
            if (!empty($book->sale_price)) {
                $bookAded['price'] = $book->sale_price;
            } else {
                $bookAded['price'] = 0;
            }
        }

        $bookAded['id'] = $book->id;
        Cart::add($bookAded);
        $this->dispatch('AddedElementToCart');
    }
    public function render()
    {
        $this->cartBooks = Cart::content()->pluck('id')->toArray();
        return view('livewire.add-to-cart');
    }
}
