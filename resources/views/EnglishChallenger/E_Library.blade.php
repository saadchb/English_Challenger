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
                            <a href="/">e-library</a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            books
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
                        <p class="woocommerce-result-count"> Showing 1–16 of 17 results</p>
                        <form class="woocommerce-ordering float-lg-right" method="get">
                            <select name="orderby" class="orderby form-control" aria-label="Shop order">
                                <option value="" selected="selected">Default sorting</option>
                                <option value="">Sort by popularity</option>
                                <option value="">Sort by average rating</option>
                                <option value="">Sort by latest</option>
                                <option value="">Sort by price: low to high</option>
                                <option value="">Sort by price: high to low</option>
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
                        <li class="product ml-4" >
                            <div class="product-wrap">
                                <a href="#" class="">
                                    @if(!empty($book->img))
                                    <img src="{{ asset('storage/'. $book->img)}}" alt="">
                                    @else
                                    <img src="{{ asset('build/assets/images/shop/book.webp')}}" alt="">
                                    @endif
                                </a>
                                <div class="product-btn-wrap">
                                    <a href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                                        <i class="fa fa-shopping-basket"></i>
                                    </a>
                                    <a href="#" class="button wish-list"><i class="fa fa-eye"></i></a>
                                </div>
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
                <section id="woocommerce_product_search-2" class="widget woocommerce widget_product_search">
                        <form role="search" method="get" class="woocommerce-product-search" action="#">
                            <label class="screen-reader-text" for="woocommerce-product-search-field-0">
                                Search for:</label>
                            <input type="search" id="woocommerce-product-search-field-0" class="search-field" onchange="fom1.submit()" placeholder="Search school…" id="search1" name="search1">
                            <button type="submit" value="Search">Search</button>
                            <input type="hidden" name="post_type" value="product">
                        </form>
                    </section>
                    <section id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter">
                        <h3 class="widget-title">Filter by price</h3>
                        <form method="get" action="#">
                            <div class="price_slider_wrapper">
                                <div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">

                                    <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 22.2222%; width: 44.4444%;"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 22.2222%;"></span>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 66.6667%;"></span>
                                </div>
                                <div class="price_slider_amount" data-step="10">
                                    <input type="text" id="min_price" name="min_price" value="0" data-min="0" placeholder="Min price" style="display: none;">
                                    <input type="text" id="max_price" name="max_price" value="90" data-max="90" placeholder="Max price" style="display: none;">
                                    <button type="submit" class="button">Filter</button>
                                    <div class="price_label">
                                        Price: <span class="from">৳&nbsp;20</span> — <span class="to">৳&nbsp;60</span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </form>
                    </section>
                    <section id="woocommerce_layered_nav-2" class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
                        <h3 class="widget-title">Filter by</h3>
                        <ul class="woocommerce-widget-layered-nav-list">
                            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">Blue</a> <span class="count">(4)</span></li>
                            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term current-cat"><a rel="nofollow" href="#">Gray</a> <span class="count">(2)</span></li>
                            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">Green</a> <span class="count">(3)</span></li>
                            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">Red</a> <span class="count">(4)</span></li>
                            <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow" href="#">Yellow</a> <span class="count">(1)</span></li>
                        </ul>
                    </section>
                    <section id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
                        <h3 class="widget-title">Product categories</h3>
                        <ul class="product-categories nav flex-column">
                            <li class="cat-item cat-item-17 cat-parent nav-item"><a href="#" class="nav-link">Clothing</a>
                                <ul class="children nav flex-column">
                                    <li class="cat-item cat-item-20 nav-item current-cat"><a href="#" class="nav-link">Accessories</a></li>
                                    <li class="cat-item cat-item-19 nav-item"><a href="#" class="nav-link">Hoodies</a></li>
                                    <li class="cat-item cat-item-18 nav-item"><a href="#" class="nav-link">Tshirts</a></li>
                                </ul>
                            </li>
                            <li class="cat-item cat-item-22 nav-item"><a href="#" class="nav-link">Decor</a></li>
                            <li class="cat-item cat-item-21 nav-item"><a href="#" class="nav-link">Music</a></li>
                            <li class="cat-item cat-item-15 nav-item"><a href="#" class="nav-link">Uncategorized</a></li>
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