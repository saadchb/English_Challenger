@extends('layouts.app')
@section('title', 'search-result')
@section('content')
<?php

use App\Models\Book;
use App\Models\review;

$books = Book::join('reviews', 'books.id', '=', 'reviews.book_id')->paginate(5);
$review = review::all();
$A_books = Book::limit(7)->get();


?>
<section id="books-bg" class="page-header" style="background-image: url('../images/bg/books-book.webp'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header-content">
                    <h1><b style=" color: #FF1949;">|</b> Search-result for: {{$results['searchTerm']}}</h1>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="/">HOME</a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            search-Page
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <h1>Search Results</h1>
    <div id="schools">
        @foreach ($results['schools'] as $school)
        <div>{{ $school->name }}</div>
        @endforeach
    </div>

    <main class="site-main page-wrapper  woocommerce">
        <!--product section start-->
        <section class="space-3">
            <div class="container">
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


                        <section id="woocommerce_product_search-2" class="widget woocommerce widget_product_search">
                        <form action="{{ route('search') }}" method="GET" class="search-form">
                                <label class="screen-reader-text" for="woocommerce-product-search-field-0">
                                    Search for:</label>
                                <input type="search" id="woocommerce-product-search-field-0" class="search-field " style="padding-left: 50px !important;"  placeholder="Search book..." id="search" name="search">
                                <button type="submit" style="background-color: #862b84;" value="Search"><i class="fas fa-search"></i></button>
                            </form>
                        </section>
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
            </div>
        </section>
    </main>



    <div id="courses">
        <section class="section-padding related-course">
            <div class="container">
                <div class="row">
                    @foreach ($results['courses'] as $course)
                    <div class="col-lg-4 col-md-6">
                        <div class="course-block">
                            <div class="course-img">
                                <img src="{{asset('storage/'.$course->img)}}" style="width:350px; height: 280px;" alt="" class="img-fluid">
                                <span class="course-label">{{ $course->level }}</span>
                            </div><br />

                            <div class="course-content">
                                <div class="course-price ">
                                    @if ($course->regular_price && !$course->sale_price)
                                    <span class="text-sm font-medium text-gray-900"><span class="uppercase"> $
                                            {{ $course->regular_price }}</span></span>
                                    @endif
                                    @if ($course->regular_price && $course->sale_price)
                                    <span class="text-sm font-medium text-gray-900"><span class="line-through pr-2 text-gray-500" style="font-size:35px;">
                                            ${{ $course->sale_price }}</span><span>${{ $course->regular_price }}</span></span>
                                    @endif
                                    @if (!$course->regular_price && !$course->sale_price)
                                    <span class="uppercase">Free</span>
                                    @endif
                                </div>

                                <h4><a href="#">{{ $course->title }}</a></h4>
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
                                            echo '<i class="fa fa-star" style="font-size:24px"></i>';
                                        }
                                        // Output half star if needed
                                        if ($hasHalfStar) {
                                            echo '<i class="fas fa-star-half-alt" style="font-size:24px"></i>';
                                            $fullStars++; // Increment full stars count for spacing
                                        }
                                        // Output empty stars to fill the remaining space
                                        for ($i = $fullStars; $i < 5; $i++) {
                                            echo '<i class="fa fa-star text-secondary" style="font-size:24px"></i>';
                                        }
                                        echo '<span>' . number_format($averageRating, 2) . ' ratings (' . $count . ')</span>';
                                    } else {
                                        for ($i = 0; $i < 5; $i++) {
                                            echo '<i class="fa fa-star text-secondary" style="font-size:24px"></i>';
                                        }
                                        echo '<span>No reviews yet</span>';
                                    }
                                    ?>
                                </div>
                                <p>{{ $course->description }}</p>

                                <div class="course-footer d-lg-flex align-items-center justify-content-between">
                                    <div class="course-meta">
                                        <span class="course-student"><i class="bi bi-group"></i>{{ $course->fake_students_enrolled }}</span>
                                        <span class="course-duration"><i class="bi bi-badge3"></i>{{ $course->nblessonsbycourses }} Lessons</span>
                                    </div>

                                    <div class="buy-btn"><a href="{{ route('course_detail', $course->id) }}" class="btn btn-primary-2 btn-small">Details</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

</div>


@endsection