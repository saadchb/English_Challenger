<?php

namespace App\Livewire;

use App\Models\Book;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class DisplayCartContent extends Component
{
    public $BooksCart;
    public $Books = array();
    public $total;


    public function removeBookCart($rowId){
        Cart::remove($rowId);
        $this->dispatch('AddedElementToCart');
    }
    public function render()
    {
        $this->Books = array();
        $this->total = Cart::total();
        $this->BooksCart = Cart::content()->toArray();
        foreach($this->BooksCart as $Book){
            $book = Book::findOrFail($Book['id']);
            $Book['img'] = $book->img;
            array_push($this->Books,$Book);
        }
        return view('livewire.display-cart-content');
    }
}
