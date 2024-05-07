<?php

namespace App\Livewire;

use App\Models\Book;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddToCart extends Component
{
    public $book = array();
    public function AddToCart($book){
        $book = Book::findOrFail($book);
        $bookAded['name'] = $book->title;
        $bookAded['qty'] = 1;
        if(empty($book->regular_price)){
            $bookAded['price'] = $book->sale_price;
        }elseif(!empty($book->regular_price) && !empty($book->sale_price)){
            $bookAded['price'] = $book->regular_price;
        }elseif(empty($book->regular_price) && empty($book->sale_price)){
            $bookAded['price'] = 0;
        }
        $bookAded['id'] = $book->id;
        Cart::add($bookAded);
        dd(Cart::content());
    }
    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
