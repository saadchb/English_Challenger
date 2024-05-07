<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class ItemCartCount extends Component
{
    public $CartCount = 0;
    #[On('AddedElementToCart')]
    public function render()
    {
        $this->CartCount = Cart::count();
        return view('livewire.item-cart-count');
    }
}
