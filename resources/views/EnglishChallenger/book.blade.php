@extends('layouts.app')
@section('title', 'book detail')
@section('content')
<section id="books-bg" class="page-header" style="background-image: url('../images/bg/books-book.webp'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header-content">
                    <h1><b style=" color: #FF1949;">|</b> Book </h1>
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
<section class="section-padding course">
    <div class="container">
        <div class="row">

            @if(session('success'))
            <div class="col-md-12" >
                <div class="blog-sidebar  mt-5 mt-lg-0 mt-md-0">
                    <div class="widget widget_search">
                        <i class="fas fa-circle-check" style="color: #63E6BE;"></i>
                        <h4>{{ session('success') }}</h4>
                        <a href="{{ route('EnglishChallenger.cart') }}" style="float: left;" class="btn">Go to Cart</a>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-sm-9 ">
            <div class="col-md-24">
                <div class="msg-alert mt-lg-0 mt-md-0" >
                    <div class="widget " style="  display: inline-flex;">
                        <i class="fas fa-circle" style="color: #63E6BE;"></i>
                        <!-- <p>{{ session('success') }}</p> -->
                        <p>A Memoir of a Life Interrupted has been added to your cart.</p>
                        <a   href="{{ route('EnglishChallenger.cart') }}" class="btn btn-main btn-small">Go to Cart</a>
                    </div>
                </div>
            </div>
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="course-img">
                            <img src="{{asset('storage/'.$book->img)}}" alt="{{$book->title}}" width="445" height="445" class="img-fluid" sizes="(max-width: 545px) 100vw, 545px">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="course-content">
                            <form action="{{route('cart.store')}}" method="Post">
                                @csrf
                                <h2><a href="#" style="color: black;">{{$book->title}}</a></h2><br>

                                <div class="course-price " style="font-size: medium;color: gray;">
                                    @if($book->regular_price && !$book->sale_price)
                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$book->regular_price}}</span>
                                    @endif

                                    @if($book->regular_price && $book->sale_price)
                                    <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$book->sale_price}}</span></del>
                                    <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$book->regular_price}}</span></ins>
                                    @endif

                                    @if(!$book->regular_price && !$book->sale_price)
                                    <span class="uppercase">Free</span>
                                    @endif

                                </div>
                                <div>
                                    <p>{{$book->description}}</p>
                                </div><br>
                                <input type="text" value="{{$book->id}}" hidden name="book_id">
                                <div><button type="submit" style="background-color: #862b84; float: left !important;">ADD TO CART</button></div><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- product Sidebar start-->
            <div class="col-lg-3 widget-area ">


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
                        <li class="cat-item cat-item-20 nav-item {{ $category->id == $currentCategoryId ? ' current-cat' : '' }}">
                            <a href="/E_Library/Categories/{{ $category->id }}">
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

    <main class="site-main woocommerce single single-product page-wrapper m-4">
        <div class="col-lg-14 ">
            <nav class="course-single-tabs">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>
                    <a class="nav-item nav-link " id="nav-feedback-tab" data-toggle="tab" href="#nav-feedback" role="tab" aria-controls="nav-contact" aria-selected="false">Feedback</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="single-course-details ">
                        <h4 class="course-title">Description</h4>
                        <p>{{$book->description}}</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-feedback" role="tabpanel" aria-labelledby="nav-feedback-tab">
                    <div class="course-widget course-info">
                        <h4 class="course-title"><i class="fas fa-comments" aria-hidden="true"></i> book Feedback</h4>
                        @if($review->isEmpty())
                        <div class="course-review-wrapper">
                            <div class="course-review">
                                <p>There are no reviews yet.</p><br>
                                <h2>Be the first to review “{{$book->title}}”</h2>
                                <p>You must be logged in to post a review.</p>
                            </div>
                        </div>
                        @else
                        @foreach ($review as $rev)
                        @if ($rev->book_id == $book->id )
                        <div class="course-review-wrapper">
                            <div class="course-review">
                                <div class="profile-img">
                                    <img src="{{asset('build/assets/images/clients/user.png')}}" alt="" class="img-fluid">
                                </div>
                                <div class="review-text">
                                    <h5>{{$rev->name}} <span style="float: right;">{{$rev->created_at}}</span></h5><br>
                                    <div class="rating">
                                        @for ($i = 0; $i < $rev->rating; $i++)
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            @endfor
                                    </div>
                                    <p>{{$rev->comments}}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                    </div>
                    <div class="comments-form p-5 mt-6" style="margin-top: 140px !important;">
                        <h3>Leave a comment </h3>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <form action="{{route('course.store')}}" class="comment_form" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-row">
                                <div class="form-group form-control h-auto rounded px-3 pt-3 pb-3 gd-rating-input-group">
                                    <div class="gd-rating-outer-wrap gd-rating-input-wrap d-flex justify-content-between flex-nowrap w-100">
                                        <span style="font-weight: lighter;">* click on star for rating</span>
                                        <div class="gd-rating gd-rating-input gd-rating-type-font-awesome">
                                            <span class="gd-rating-wrap d-inline-flex position-relative c-pointer">
                                                <!-- Five star icons -->
                                                <span class="star" data-value="1"><i class="fas fa-star" style="font-size:24px" aria-hidden="true"></i></span>
                                                <span class="star" data-value="2"><i class="fas fa-star" style="font-size:24px" aria-hidden="true"></i></span>
                                                <span class="star" data-value="3"><i class="fas fa-star" style="font-size:24px" aria-hidden="true"></i></span>
                                                <span class="star" data-value="4"><i class="fas fa-star" style="font-size:24px" aria-hidden="true"></i></span>
                                                <span class="star" data-value="5"><i class="fas fa-star" style="font-size:24px" aria-hidden="true"></i></span>
                                            </span>
                                            <!-- Text to display rating level -->
                                            <span class="gd-rating-text badge badge-light border" style="font-size: larger;" data-title="Select a rating">Select a rating</span>
                                            <!-- Hidden input field to store selected rating -->
                                            <input type="hidden" id="rating" name="rating">
                                        </div>
                                        <span class="gd-rating-label font-weight-bold fw-bold p-0 m-0">Overall</span>
                                    </div>
                                </div>
                                <br>
                                @error('rating')
                                <div style="color: red;">{{$message}}</div><br>
                                @enderror
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="comments" id="msgt" cols="30" rows="6" placeholder="Comment" class="form-control"></textarea>
                                    </div>
                                </div><br>
                                @error('comments')
                                <div style="color: red;">{{$message}}</div><br>
                                @enderror
                                <input type="number" name="book_id" hidden value="{{$book->id}}">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="website" placeholder="Website">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name"><br>
                                    </div>
                                </div><br>
                                @error('name')
                                <div style="color: red;">{{$message}}</div><br>
                                @enderror
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Email"><br>
                                    </div>
                                </div><br>
                                @error('email')
                                <div style="color: red;">{{$message}}</div><br>
                                @enderror
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-main">Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><br><br>
        <section class="related products">

            <h2>Related products</h2>
            <form action="action={{route('cart.store')}}" method="Post">
                <ul class="products columns-5">
                    @foreach ($categories_books as $books)
                    <li class="product">
                        <div class="product-wrap">
                            <a href="#" class="">
                                <img src="{{asset('storage/'.$books->img)}}" style="height:200px; width:200px" alt="{{$books->title}}">
                            </a>
                            <div class="product-btn-wrap">
                                <a href="/E_library/book/{{$books->id}}" class="button wish-list"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="woocommerce-product-title-wrap">
                            <h2 class="woocommerce-loop-product__title">
                                <a href="#">{{$books->tile}}</a>
                            </h2>
                        </div>
                        <span class="price">
                            @if($books->regular_price && !$books->sale_price)
                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$books->regular_price}}</span>
                            @endif

                            @if($books->regular_price && $books->sale_price)
                            <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$ </span>{{$books->sale_price}}</span></del>
                            <ins><span><span style="text-decoration: none;"> $ </span>{{$books->regular_price}}</span></ins>
                            @endif

                            @if(!$books->regular_price && !$books->sale_price)
                            <span class="uppercase">Free</span>
                            @endif
                        </span>

                        <p style="max-height: 5.6em; overflow: hidden;">{{$books->description}}</p>

                        <div class="rating">
                            <?php
                            $review =  App\Models\review::all();

                            $totalRating = 0;
                            $count = 0;
                            foreach ($review as $rev) {
                                if ($rev->book_id == $books->id) {
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
                        </div><br>
                        <input type="text" value="{{$books->id}}" name="book_id">
                        <div><button type="submit" style="background-color: #862b84; " class="text-outline"> <a href="#">
                                </a><i class="fa fa-cart-plus"></i> ADD TO CART</button></div>
                    </li>
                    @endforeach
            </form>
            </ul>


        </section>
    </main>
</section>
<script>
    $(document).ready(function() {
        // Function to toggle tab text
        function toggleTabText(tabId, newText) {
            $(tabId).text(newText);
        }

        // Add event listeners to toggle tab text on click
        $('#tab-title-reviews').click(function() {
            toggleTabText('#tab-title-reviews a', 'Review');
        });

        $('#tab-title-description').click(function() {
            toggleTabText('#tab-title-description a', 'Description');
        });
    });
</script>



@endsection