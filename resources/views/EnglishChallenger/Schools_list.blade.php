@extends('layouts.app')
@section('title', 'Schools')
@section('content')
<?php

use App\Models\Course;
use App\Models\review;

$review = review::all();

$courses = Course::query()->latest()->paginate(4);

?>
<section id="school-b" class="page-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header-content">
                    <h1>Schools</h1>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="/index">Home</a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            schools
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
                        <h2 class="title d-block text-left-sm">Schools</h2>
                        <p class="woocommerce-result-count">
                            @php
                            $totalSchool = App\Models\School::count();
                            @endphp

                            Showing {{ $schools->count() }} of {{ $totalSchool }} results</p>
                        <form class="woocommerce-ordering float-lg-right" method="get">
                            <select name="orderby" class="orderby form-control" aria-label="Shop order">
                                <option value="" selected="selected">Default sorting</option>
                                <option value="">Sort by average rating</option>
                                <option value="">Sort by latest</option>

                            </select>
                            <input type="hidden" name="paged" value="1">
                        </form>
                    </div>
                    <ul class="products columns-4 ">
                        @if ($schools->isEmpty())
                        <!-- Display error message -->
                        <div class="error-page text-center error-404 not-found">
                            <div class="error-message">
                                <h3>Oops... Not Found!</h3>
                            </div>
                            <div class="error-content">
                                Try click on button to back to schools<br>
                                <a href="/Schools_list" class="btn btn-main" style="background-color: #862b84;">Back to Schools Page</a>
                            </div>
                        </div>
                        @else
                        @foreach ($schools as $school)
                        <li class="product mb-4" style="width: 19rem;">
                            <div class="product-wrap">
                                <a href="#" class="">
                                    @if(!empty($school->school_logo))

                                    <img src="{{ asset('storage/'. $school->school_photo)}}" onerror="this.onerror=null;this.src='{{ $school->school_photo }}';" style="height:222px;" class="img-fluid" alt="school photo">

                                    @else
                                    <img src="{{ asset('build/assets/images/shop/school_thumb.png')}}" style="height:222px;" class="img-fluid" alt="">
                                    @endif
                                </a>
                                <div class="product-btn-wrap">
                                    <a href="/school/{{$school->id}}" class="button wish-list"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="woocommerce-product-title-wrap">
                                <h2 class="woocommerce-loop-product__title">
                                    <a href="#">{{$school->school_name}}</a>
                                </h2>
                            </div>
                            <span class="onsale">{{$school->school_city}}</span>
                            <span class="price">
                                <ins>
                                    <span class="woocommerce-Price-amount amount m-2">
                                        <span class="woocommerce-Price-currencySymbol "><i class='fas fa-map-marker-alt' style="color: #862b84;"></i></span>
                                        {{$school->adresse}}</span><br>
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol"><i class='fas fa-phone' style="color: #862b84;"></i></span>
                                        {{$school->phone_number}}</span>
                                </ins>
                            </span>
                            <br>
                            <!-- Display stars based on rating -->
                            <div class="rating">
                                <?php
                                $totalRating = 0;
                                $count = 0;
                                foreach ($review as $rev) {
                                    if ($rev->school_id == $school->id) {
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
                        </li>
                        @endforeach
                        @endif
                    </ul>

                    @if ($schools->isEmpty())
                    <nav class="woocommerce-pagination">
                        <ul class="page-numbers">
                            <li></li>
                        </ul>
                    </nav>
                    @else
                    <nav class="woocommerce-pagination">
                        <ul class="page-numbers">
                            @if ($schools->previousPageUrl())
                            <li><a class="next page-numbers" href="{{ $schools->previousPageUrl() }}"><i class="fas fa-long-arrow-alt-left"></i></a></li>
                            @endif

                            @if ($schools->currentPage() > 3)
                            <li><a class="page-numbers" href="{{ $schools->url(1) }}">1</a></li>
                            @if ($schools->currentPage() > 4)
                            <li><span>...</span></li>
                            @endif
                            @endif

                            @for ($i = max(1, $schools->currentPage() - 2); $i <= min($schools->lastPage(), $schools->currentPage() + 2); $i++)
                                <li><a class="page-numbers @if ($i == $schools->currentPage()) current @endif" href="{{ $schools->url($i) }}">{{ $i }}</a></li>
                                @endfor

                                @if ($schools->currentPage() < $schools->lastPage() - 2)
                                    @if ($schools->currentPage() < $schools->lastPage() - 3)
                                        <li><span>...</span></li>
                                        @endif
                                        <li><a class="page-numbers" href="{{ $schools->url($schools->lastPage()) }}">{{ $schools->lastPage() }}</a></li>
                                        @endif

                                        @if ($schools->nextPageUrl())
                                        <li><a class="next page-numbers" href="{{ $schools->nextPageUrl() }}"><i class="fas fa-long-arrow-alt-right"></i></a></li>
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

                    <section id="woocommerce_top_rated_products-2" class="widget woocommerce widget_top_rated_products">
                        <h3 class="widget-title">latest courses</h3>
                        @foreach($courses as $course)
                        <ul class="product_list_widget">
                            <li>
                                <a href="/course_detail/{{(int)$course->id}}">
                                    <img width="300" height="300" src="{{asset('storage/'.$course->img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">
                                    <span class="product-title">{{ $course->title }}</span>
                                </a>
                                @if($course->regular_price && !$course->sale_price)
                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$course->regular_price}}</span>
                                @endif

                                @if($course->regular_price && $course->sale_price)
                                <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$ </span>{{$course->sale_price}}</span></del>
                                <ins><span><span style="text-decoration: none;"> $ </span>{{$course->regular_price}}</span></ins>
                                @endif

                                @if(!$course->regular_price && !$course->sale_price)
                                <span class="uppercase">Free</span>
                                @endif

                            </li>
                        </ul>
                        @endforeach
                    </section>

                </div>
                <!-- product section end-->

            </div>
        </div>
    </section>
    <!-- product section end-->


</main>
@endsection
