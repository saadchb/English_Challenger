@extends('layouts.app')
@section('title', 'cart')
@section('content')
<section id="books-bg" class="page-header" style="background-image: url('../images/bg/books-book.webp'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header-content">
                    <h1><b style=" color: #FF1949;">|</b> CART </h1>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="/">HOME</a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            Cart
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<main class="site-main woocommerce single single-product page-wrapper">
    <!--shop category start-->
    <section class="space-3">
        <div class="container sm-center">
            <div class="row">
                <div class="col-lg-8">
                    <article id="post-6" class="post-6 page type-page status-publish hentry">
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="woocommerce-notices-wrapper"></div>
                                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="product-remove"></th>
                                            <th class="product-thumbnail"></th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Books as $book)
                                        @if(empty($book->deleted_at))
                                        <tr class="woocommerce-cart-form__cart-item cart_item">

                                            <td>
                                                <form action="{{ route('cart.destroy', $book->id) }}" method="post">

                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                    <a class="submitButton remove" aria-label="Remove this item" data-product_id="30" data-product_sku="">×</a>
                                                </form>
                                            </td>
                                            <!-- <a href="#" id="submitButton" class="remove" aria-label="Remove this item">
                                                ×
                                                </a> -->
                                            <td class="product-thumbnail">
                                                <a href="/E_library/book/{{$book->book_id}}"><img width="324" height="324" src="{{asset('storage/'. $book->img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""></a>
                                            </td>
                                            <td class="product-name" data-title="Product">
                                                <a href="/E_library/book/{{$book->book_id}}">{{$book->title}}</a>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                @if($book->regular_price && !$book->sale_price)
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$book->regular_price}}</span>
                                                @endif
                                                @if(!$book->regular_price && !$book->sale_price)
                                                <span class="uppercase">Free</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- .entry-content -->
                    </article>
                </div>
                <div class="col-lg-4">
                    <div class="cart-collaterals">
                        <div class="cart_totals ">
                            <h2>Cart totals</h2>
                            <table cellspacing="0" class="shop_table shop_table_responsive">
                                <tbody>
                                    @php
                                    $total = 0;
                                    foreach ($Books as $book) {
                                    if (!empty($book->deleted_at)) {
                                    continue; // Skip deleted books
                                    }
                                    if ($book->regular_price) {
                                    $total += $book->regular_price;
                                    }
                                    }
                                    @endphp
                                    <tr class="order-total">

                                        <th>Total</th>
                                        <td data-title="Total">
                                            <strong>
                                                @if ($total == 0)
                                                Free
                                                @else
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{ $total }}</span>
                                                @endif
                                            </strong>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <a href="/checkout" class="checkout-button button alt wc-forward">
                                    Proceed to checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--shop category end-->
</main>
<script>
    // Loop through each book and attach event listeners
    function SubmitForm() {
        const eleT = document.querySelectorAll(".submitButton");
        for (let i = 0; i < eleT.length; i++) {
            eleT[i].addEventListener("click", function() {
                this.parentElement.submit();
                // console.log('helo');
            });
        }
    }
    SubmitForm()
</script>


@endsection