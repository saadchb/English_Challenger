<div >
        <input type="hidden" name="book_id" value="{{ $book->id }}">
    @if(in_array($book->id,$cartBooks ))
    <a href="/cart"> <button class="submitButton button product_type_simple add_to_cart_button ajax_add_to_cart">
    <i class="fas fa-cart-arrow-down"></i> </button></a>
    <a href="/E_library/book/{{$book->id}}" class="button wish-list"><i class="fa fa-eye"></i></a>

    @else
    <a>
        <button class="submitButton button product_type_simple add_to_cart_button ajax_add_to_cart" wire:click = 'AddToCart({{$book->id}})'>
            <i class="fa fa-shopping-basket "></i>
        </button>

    </a>
    <a href="/E_library/book/{{$book->id}}" class="button wish-list"><i class="fa fa-eye"></i></a>
    @endif
</div>
