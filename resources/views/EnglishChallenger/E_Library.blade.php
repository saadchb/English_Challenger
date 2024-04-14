@extends('layouts.app')
@section('title', 'library')
@section('content')
<section id="books-bg" class="page-header" style="background-image: url('../images/bg/books-book.webp'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header-content">
                    <h1><b style=" color: #FF1949;">|</b> Books List</h1>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="/">HOME</a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            e-library
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<main class="site-main page-wrapper  woocommerce">
    <!--product section start-->
    <section class="space-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="section-title">
                        <h2 class="title d-block text-left-sm">Books Shoping</h2>
                        <p class="woocommerce-result-count">
                            @php
                            $totalBooks = App\Models\Book::count();
                            @endphp

                            Showing {{ $books->count() }} of {{ $totalBooks }} results
                        </p>
                        <form class="woocommerce-ordering float-lg-right" method="get" action="/E_library">

                            <select name="orderby" class="submitButton orderby form-control" aria-label="Shop order">
                                <option value="default">Default sorting</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="latest">Sort by latest</option>
                                <option value="price_low_high">Sort by price: low to high</option>
                                <option value="price_high_low">Sort by price: high to low</option>
                            </select>
                            <input type="hidden" name="paged" value="1">
                        </form>

                    </div>
                    <ul class="products columns-4">
                        @if ($books->isEmpty())
                        <!-- Display error message -->
                        <div class="error-page text-center error-404 not-found">
                            <div class="error-message">
                                <h3>Oops... Not Found!</h3>
                            </div>
                            <div class="error-content">
                                Try click on button to back to books<br>
                                <a href="/E_Library" class="btn" style="background-color: #862b84;">Back to books Page</a>
                            </div>
                        </div>
                        @else
                        @foreach ($books as $book)
                        <li class="product ml-4">
                            <div class="product-wrap">
                                <a href="#" class="">
                                    @if(!empty($book->img))
                                    <img src="{{ asset('storage/'. $book->img)}}" alt="">
                                    @else
                                    <img src="{{ asset('build/assets/images/shop/book.webp')}}" alt="">
                                    @endif
                                </a>
                                <!-- <div class="product-btn-wrap"> -->
                                @if(!(in_array($book->id, $cartBooks)))
                                <!-- Show this if the book is already in the cart -->
                                <form id="btn-wr" action="{{ route('cart.store') }}" method="POST">
                                    <div class="product-btn-wrap">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                        <a> <button class="submitButton button product_type_simple add_to_cart_button ajax_add_to_cart">
                                                <i class="fa fa-shopping-basket "></i>
                                            </button></a>
                                        <a href="/E_library/book/{{$book->id}}" class="button wish-list"><i class="fa fa-eye"></i></a>
                                    </div>
                                </form>
                                @else
                                <div class="product-btn-wrap">
                                    <!-- Show this if the book is not in the cart -->

                                    <a href="/cart" class="submitButton button product_type_simple add_to_cart_button ajax_add_to_cart ">
                                        <i class="fa fa-cart-arrow-down "></i>
                                    </a>

                                    <a href="/E_library/book/{{$book->id}}" class="button wish-list"><i class="fa fa-eye"></i></a>
                                </div>
                                @endif
                            </div>
                            <div class="woocommerce-product-title-wrap">
                                <h2 class="woocommerce-loop-product__title">
                                    <a href="#">{{$book->title}}</a>
                                </h2>
                            </div>
                            <!-- <span class="onsale">Sale!</span> -->
                            <span class="price">
                                @if($book->regular_price && !$book->sale_price)
                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$book->regular_price}}</span>
                                @endif

                                @if($book->regular_price && $book->sale_price)
                                <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$ </span>{{$book->sale_price}}</span></del>
                                <ins><span><span style="text-decoration: none;"> $ </span>{{$book->regular_price}}</span></ins>
                                @endif

                                @if(!$book->regular_price && !$book->sale_price)
                                <span class="uppercase">Free</span>
                                @endif
                            </span>

                            <!-- Display stars based on rating -->
                            <div class="rating">
                                <?php


                                $totalRating = 0;
                                $count = 0;
                                foreach ($reviews as $rev) {
                                    if ($rev->book_id == $book->id) {
                                        $totalRating += $rev->rating;
                                        $count++;
                                    }
                                }
                                if ($count > 0) {
                                    $averageRating = $totalRating / $count;
                                    // Round average rating to the nearest 0.5
                                    $roundedRating = round($averageRating * 2) / 2;
                                    // Output full stars
                                    $fullStars = floor($roundedRating);
                                    // Output half star if needed
                                    $hasHalfStar = $roundedRating - $fullStars >= 0.5;
                                    for ($i = 0; $i < $fullStars; $i++) {
                                        echo '<i class="fa fa-star" ></i>';
                                    }
                                    // Output half star if needed
                                    if ($hasHalfStar) {
                                        echo '<i class="fas fa-star-half-alt" ></i>';
                                        $fullStars++; // Increment full stars count for spacing
                                    }
                                    // Output empty stars to fill the remaining space
                                    for ($i = $fullStars; $i < 5; $i++) {
                                        echo '<i class="fa fa-star text-secondary" ></i>';
                                    }
                                    echo '<span>' . number_format($averageRating, 2) . ' ratings (' . $count . ')</span>';
                                } else {
                                    for ($i = 0; $i < 5; $i++) {
                                        echo '<i class="fa fa-star text-secondary" ></i>';
                                    }
                                    echo '<span>No reviews yet</span>';
                                }
                                ?>
                            </div>
                        </li>
                        @endforeach
                        @endif
                    </ul>

                    @if ($books->isEmpty())
                    <nav class="woocommerce-pagination">
                        <ul class="page-numbers">
                            <li></li>
                        </ul>
                    </nav>
                    @else
                    <nav class="woocommerce-pagination">
                        <ul class="page-numbers">
                            @if ($books->previousPageUrl())
                            <li><a class="next page-numbers" href="{{ $books->previousPageUrl() }}"><i class="fas fa-long-arrow-alt-left"></i></a></li>
                            @endif
                            @for ($i = 1; $i <= $books->lastPage(); $i++)
                                <li><a class="page-numbers" href="{{ $books->url($i) }}">{{ $i }}</a></li>
                                @endfor
                                @if ($books->nextPageUrl())
                                <li><a class="next page-numbers" href="{{ $books->nextPageUrl() }}"><i class="fas fa-long-arrow-alt-right"></i></a></li>
                                @endif
                        </ul>
                    </nav>
                    @endif
                </div>

                <!-- product Sidebar start-->
                <div class="col-lg-4 widget-area ">

                    <!-- Add the price filter section -->
                    <section id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter">
                        <h3 class="widget-title">Filter by price</h3>
                        <form id="price_filter_form" method="get" action="{{ route('filter.products') }}">
                            <div class="price_slider_wrapper">
                                <div id="price_slider" class="price_slider"></div>
                                <div class="price_slider_amount" data-step="10">
                                    <input type="hidden" id="min_price" name="min_price" value="{{ $minPrice }}">
                                    <input type="hidden" id="max_price" name="max_price" value="{{ $maxPrice }}">
                                    <button type="submit" class="button">Filter</button>
                                    <div class="price_label">
                                        Price: <span id="min_price_label" class="from"></span> — <span id="max_price_label" class="to"></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </form>
                    </section>

                    <section id="woocommerce_product_search-2" class="widget woocommerce widget_product_search">
                        <form role="search" method="get" class="woocommerce-product-search" action="#">
                            <label class="screen-reader-text" for="woocommerce-product-search-field-0">
                                Search for:</label>
                            <input type="search" id="woocommerce-product-search-field-0" class="search-field" onchange="fom1.submit()" placeholder="Search school…" id="search1" name="search1">
                            <button type="submit" style="background-color: #862b84;" value="Search"><i class="fas fa-search"></i></button>
                            <input type="hidden" name="post_type" value="product">
                        </form>
                    </section>
                    <section id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
                        <h3 class="widget-title">Product categories</h3>
                        <ul class="product-categories nav flex-column">
                            @foreach ($categories->unique('title') as $category)
                            <li class="cat-item cat-item-20 nav-item ">
                                <a href="/E_Library/Categories/{{$category->id}}">
                                    {{ $category->title }}
                                </a>
                                <span class="count">({{ $category->books_count }})</span>

                            </li>
                            @endforeach
                        </ul>
                    </section>
                </div>
                <!-- product section end-->
            </div>
        </div>
    </section>
    <!-- product section end-->


</main>






@endsection