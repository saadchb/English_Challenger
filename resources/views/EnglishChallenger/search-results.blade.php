@extends('layouts.app')
@section('title', 'search-result')
@section('content')
<?php

use App\Models\Book;
use App\Models\Course;
use App\Models\review;

$books = Book::join('reviews', 'books.id', '=', 'reviews.book_id')->paginate(5);
$review = review::all();
$A_books = Book::limit(6)->get();
$A_courses = Course::latest()->limit(6)->get();
?>
<!--page header-->
<section id="search-bg" class="page-header mb-0" style="margin-bottom: 0 !important; background-image: url('../images/bg/books-book.webp'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header-content">
                    <h3><b style=" color: #FF1949;">|</b> Search-result for: <span style=" color: #1a61a7;"> {{$results['searchTerm']}}</span></h3>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="/">HOME</a>
                        </li>
                        <li class="list-inline-item">
                            search-Page
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container " style="margin-top: -140px !important;">
    <main class="site-main page-wrapper  woocommerce">
        @if(collect($results['courses'])->isNotEmpty() || collect($results['books'])->isNotEmpty())
        <!--course section start-->
        @if(collect($results['courses'])->isNotEmpty())
            <h2 class="mb-4">Search Results for <b style="color: #FF1949;">Courses</b></h2><br>
            <section class="space-3">
                <div class="row">

                    <!-- <div class="col-lg- mb-4 mb-lg-0">
                                @foreach ($results['courses'] as $course)
                                    <div class="course-block course-style-2"  style="width: 18.5rem; height: 28rem; ">
                                        <div class="course-img">
                                            <img src="assets/images/course/course2.jpg" alt="" class="img-fluid">
                                            <span class="course-cat">Advanced</span>
                                        </div>

                                        <div class="course-content">
                                            <h4><a href="#">Photography Crash Course for Photographer</a></h4>
                                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>
                                            <div class="course-footer d-lg-flex align-items-center justify-content-between">
                                                <div class="course-meta">
                                                    <span class="course-student"><i class="bi bi-group"></i>340</span>
                                                    <span class="course-duration"><i class="bi bi-badge3"></i>82</span>
                                                </div>

                                                <div class="course-price ">$80 <span class="del">$120</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div> -->
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <ul class="products columns-4">
                            @foreach ($results['courses'] as $course)
                            <li class="product ml-4 p-2 course-block course-style-2" style="width: 16.5rem; height: 28rem; ">
                                <div class="product-wrap">
                                    <a href="/course_detail/{{$course->id}}" class="">
                                        @if(!empty($course->img))
                                        <img src="{{asset('storage/'.$course->img)}}" class="image-fluid" style="height: 15rem !important;" alt="">
                                        @else
                                        <img src="{{ asset('build/assets/images/shop/course_thumb.jpg')}}" alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="woocommerce-product-title-wrap">
                                    <h2 class="woocommerce-loop-product__title">
                                        <a href="/course_detail/{{$course->id}}">{{$course->title}}</a>
                                    </h2>
                                </div>

                                <div class="rating">
                                    <?php


                                    $totalRating = 0;
                                    $count = 0;
                                    foreach ($review as $rev) {
                                        if ($rev->course_id == $course->id) {
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
                                <div class="course-footer d-flex align-items-center justify-content-between mt-2">
                                    <div class="course-meta">
                                        <span class="course-student"><i class="bi bi-group"></i>340</span>
                                        <span class="course-duration"><i class="bi bi-badge3"></i>82</span>
                                    </div>


                                    <div class="course-price ">$80 <span class="del">$120</span></div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-4 widget-area ">

                        <!--search mini-->
                        <section id="woocommerce_product_search-2" class="widget woocommerce widget_product_search">
                            <form action="{{ route('search.result') }}" method="GET" class="search-form">
                                <label class="screen-reader-text" for="woocommerce-product-search-field-0">
                                    Search for:</label>
                                <input type="search" id="woocommerce-product-search-field-0" class="search-field " style="padding-left: 50px !important;" placeholder="Search for..." id="search" name="search">
                                <button type="submit" style="background-color: #862b84;" value="Search"><i class="fas fa-search"></i></button>
                            </form>
                        </section>
                        <!--All Book-->
                        <div class="blog-sidebar mt-5 mt-lg-0 mt-md-0">
                            <div class="widget widget_categories">
                                <h4 class="widget-title">All COURSE</h4>
                                <ul>
                                    @foreach ($A_courses as $book)
                                    <li class="cat-item"><a href="#"><i class="fa fa-angle-right"></i>{{ $book->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        @endif
        <!--Book section start-->
        @if(collect($results['books'])->isNotEmpty())
            <h2 class="mb-4">Search Results for <b style="color: #1a61a7;">Books</b></h2>
            <section class="space-3">

                <div class="row">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <ul class="products columns-4">

                            @foreach ($results['books'] as $book)
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

                                    <div class="product-btn-wrap">
                                        <!-- Show this if the book is not in the cart -->
                                        <a href="/E_library/book/{{$book->id}}" class="button wish-list"><i class="fa fa-eye"></i></a>
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
                                    foreach ($review as $rev) {
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
                        </ul>
                    </div>
                    <div class="col-lg-4 widget-area ">

                        <!--search mini-->
                        <section id="woocommerce_product_search-2" class="widget woocommerce widget_product_search">
                            <form action="{{ route('search.result') }}" method="GET" class="search-form">
                                <label class="screen-reader-text" for="woocommerce-product-search-field-0">
                                    Search for:</label>
                                <input type="search" id="woocommerce-product-search-field-0" class="search-field " style="padding-left: 50px !important;" placeholder="Search for..." id="search" name="search">
                                <button type="submit" style="background-color: #862b84;" value="Search"><i class="fas fa-search"></i></button>
                            </form>
                        </section>
                        <!--All Book-->
                        <div class="blog-sidebar mt-5 mt-lg-0 mt-md-0">
                            <div class="widget widget_categories">
                                <h4 class="widget-title">All books</h4>
                                <ul>
                                    @foreach ($A_books as $book)
                                    <li class="cat-item"><a href="#"><i class="fa fa-angle-right"></i>{{ $book->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @else
            <!-- Display message when no search results are found -->
            <div class="container " style="margin-top: -98px !important;">
                <main class="site-main page-wrapper  woocommerce">
                    <section class="space-3">
                        <div class="row">
                            <div class="col-lg-8 mb-4 mt-4 mb-lg-0 text-center">
                            <div class="col-md-24">
                        <div class="msg-error mt-lg-0 mt-md-0">
                            <div class="widget ">
                                <div style=" font-size: large; display: inline-flex; width: auto;padding:3%;justify-content: center;">
                                    <p><i class="fas fa-exclamation mr-4"></i> No Result Found </p>
                                </div>
                            </div>

                        </div>
                    </div>
                            </div>
                            <div class="col-lg-4 widget-area ">
                                <!--search mini-->
                                <section id="woocommerce_product_search-2" class="widget woocommerce widget_product_search">
                                    <form action="{{ route('search.result') }}" method="GET" class="search-form">
                                        <label class="screen-reader-text" for="woocommerce-product-search-field-0">
                                            Search for:</label>
                                        <input type="search" value="{{$results['searchTerm']}}" id="woocommerce-product-search-field-0" class="search-field " style="padding-left: 50px !important;" placeholder="Search for..." id="search" name="search">
                                        <button type="submit" style="background-color: #862b84;" value="Search"><i class="fas fa-search"></i></button>
                                    </form>
                                </section>
                                <div class="blog-sidebar mt-5 mt-lg-0 mt-md-0">
                                <div class="widget widget_categories">
                                    <h4 class="widget-title">Latest Course </h4>
                                    <ul>
                                        @foreach ($A_courses as $book)
                                        <li class="cat-item"><a href="#">{{ $book->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            </div>
                        
                        </div>
                    </section>
                </main>
            </div>
        @endif
    </main>
</div>

@endsection