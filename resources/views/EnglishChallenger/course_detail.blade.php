@extends('layouts.app')
@section('title', 'detail course')
@section('content')
<?php

use App\Models\Book;
use App\Models\Course;
use App\Models\review;
$books= Book::join('reviews','books.id','=','reviews.book_id')->paginate(5);
// $books = Book::limit(3)->get();
$review = review::all();
$courses = Course::query()->latest()->paginate(5);
?>
<section class="page-wrapper edutim-course-single course-single-style-3">
    <div class="course-single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course-single-header white-text">
                        <span class="subheading">
                            @foreach ($categories as $index => $categorie)
                            {{ $categorie->title }}@if (!$loop->last)
                            ,
                            @endif
                            @endforeach
                        </span>
                        <h3 class="single-course-title">{{ $course->title }}</h3>
                        <p style="height:100px ;"></p>
                        <div class="d-flex align-items-center ">
                            <div class="single-top-meta">
                                <i class="fa fa-user"></i><span>{{$course->fake_students_enrolled == null ? 0:$course->fake_students_enrolled}} Students Enrolled</span>
                            </div>
                            <div class="single-top-meta">
                                <div class="single-top-meta">
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
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav class="course-single-tabs">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Overview</a>
                        <a class="nav-item nav-link" id="nav-topics-tab" data-toggle="tab" href="#nav-topics" role="tab" aria-controls="nav-profile" aria-selected="false">Curriculum</a>
                        <a class="nav-item nav-link" id="nav-instructor-tab" data-toggle="tab" href="#nav-instructor" role="tab" aria-controls="nav-contact" aria-selected="false">Instructor</a>
                        <a class="nav-item nav-link" id="nav-feedback-tab" data-toggle="tab" href="#nav-feedback" role="tab" aria-controls="nav-contact" aria-selected="false">Feedback</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="single-course-details ">
                            <h4 class="course-title">Description</h4>
                            <p>{{ $course->description }}</p>


                            <div class="course-widget course-info">
                                <h4 class="course-title">What You will Learn?</h4>
                                <ul>
                                    @foreach ($curricula as $curriculum)
                                    <li>
                                        @if ($curriculum->description)
                                        <i class="fa fa-check"></i>
                                        {{ $curriculum->description }}
                                        @endif
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-topics" role="tabpanel" aria-labelledby="nav-topics-tab">
                        <!--  Course Topics -->
                        <div class="edutim-single-course-segment  edutim-course-topics-wrap">
                            <div class="edutim-course-topics-header d-lg-flex justify-content-between">
                                <div class="edutim-course-topics-header-left">
                                    <h4 class="course-title">Curriculum for this course</h4>
                                </div>
                                <div class="edutim-course-topics-header-right">
                                    <span> Total learning: <strong>{{ $course->nblessonsbycourse() }}
                                            Lesons</strong></span>
                                    <span> Time: <strong>{{ $course->duration }} {{ $course->duration_gauge }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="edutim-course-topics-contents">
                                <div class="edutim-course-topic ">
                                    <div class="accordion" id="accordionExample">
                                        @foreach ($curricula as $index => $curriculum)
                                        <div class="card">
                                            <div class="card-header" id="heading{{ $index }}">
                                                <h2 class="mb-0">
                                                    <button class="btn-block text-left collapsed curriculmn-title-btn" type="button" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                                        <h4 class="curriculmn-title">{{ $curriculum->title }}</h4>
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapse{{ $index }}" class="collapse" aria-labelledby="heading{{ $index }}" data-parent="#accordionExample">
                                                <div class="course-lessons">
                                                    @foreach ($curriculum->lessons as $lesson)
                                                    <div class="single-course-lesson">
                                                        <div class="course-topic-lesson">
                                                            <a href="/curriculum_list"><span>{{ $lesson->title }}</span></a>
                                                        </div>

                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  COurse Topics End -->

                    </div>
                    <div class="tab-pane fade" id="nav-instructor" role="tabpanel" aria-labelledby="nav-instructor-tab">
                        <div class="course-widget course-info">
                            <h4 class="course-title">About the instructors</h4>
                            <div class="instructor-profile">
                                <div class="profile-img">
                                    <img src="assets/images/blog/author.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="profile-info">
                                    <h5>Meraz Ahmed</h5>
                                    <div class="rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-half"></i></a>
                                        <span>3.79 ratings (29 )</span>
                                    </div>
                                    <p>I'm a developer with a passion for teaching. I'm the lead instructor at the
                                        London App Brewery, London's leading Programming Bootcamp. I've helped hundreds
                                        of thousands of students learn to code and change their lives by becoming a
                                        developer </p>
                                    <div class="instructor-courses">
                                        <span><i class="bi bi-folder"></i>4 Courses</span>
                                        <span><i class="bi bi-group"></i>400 Students</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-feedback" role="tabpanel" aria-labelledby="nav-feedback-tab">
                        <div class="course-widget course-info">
                            <h4 class="course-title"><i class="fas fa-comments" aria-hidden="true"></i> Students Feedback</h4>
                            @foreach ($review as $rev)
                            @if ($rev->course_id == $course->id)
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
                        </div>
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
                                <input type="number" name="course_id" hidden value="{{$course->id}}">
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

            <div class="col-lg-4">
                <div class="course-sidebar">
                    <div class="course-single-thumb">
                        <img src="{{ asset('storage/' . $course->img) }}" alt="" style="height:300px; width:300px; margin-left:11px;" class="img-flui ">
                        <div class="course-price-wrapper">
                            <div class="course-price ml-3">
                                <h4>Price: <span><span class="text-sm font-medium text-gray-900">
                                            @if ($course->regular_price && !$course->sale_price)
                                            <span class="text-sm font-medium text-gray-900"><span class="uppercase"> $
                                                    {{ $course->regular_price }}</span></span>
                                            @endif
                                            @if ($course->regular_price && $course->sale_price)
                                            <span class=" font-medium text-gray-900">
                                                <span class="course-price">
                                                    $ {{$course->sale_price}}
                                                </span>
                                                <span class="del" style="font-size:35px;">
                                                    $ {{$course->regular_price}}
                                                </span>
                                            </span>
                                            @endif
                                            @if (!$course->regular_price && !$course->sale_price)
                                            <span class="uppercase">Free</span>
                                            @endif
                                        </span></span></h4>
                            </div>
                            <div class="buy-btn"><a href="#" class="btn btn-main btn-block">Buy This
                                    Course</a></div>
                        </div>
                    </div>


                    <div class="course-widget course-metarials">
                        <h4 class="course-title">Requirements</h4>
                        <ul>

                            @foreach ($requirements as $requirement)
                            <li>
                                <i class="fa fa-check"></i>
                                {{ $requirement->title }}
                            </li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="course-widget course-details-info">
                        <h4 class="course-title">This Course Includes</h4>
                        <ul>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-graph-bar"></i>Skill level : </span>
                                    {{ $course->level ?? 'All levels' }}
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-user-ID"></i>Instructor :</span>
                                    <a href="#" class="d-inline-block">Jone Smit</a>
                                </div>
                            </li>

                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-flag"></i>Duration :</span>
                                    {{ $course->duration }} {{ $course->duration_gauge }}
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-paper"></i>Lessons :</span>
                                    {{ $course->nblessonsbycourse() }}
                                </div>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-forward"></i>Language :</span>
                                    English
                                </div>
                            </li>

                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-madel"></i>Certificate :</span>
                                    yes
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="course-widget course-share d-flex justify-content-between align-items-center">
                        <span>Share</span>
                        <ul class="social-share list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>



                    <div class="course-widget">
                        <h4 class="course-title">Tags</h4>
                        <div class="single-course-tags">
                            @foreach ($tags as $tag)
                            <a href="#">{{ $tag->title }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- <div class="course-widget course-metarials"> -->
                        <h4 class="course-title">Top rated books</h4>
                        <section id="woocommerce_top_rated_products-2" class="widget woocommerce widget_top_rated_products">
                            @if(( $books->where('rating')->count())>=3)
                            @foreach ($books as $book)
                            <ul class="product_list_widget" id="prod_edit">
                                <li>
                                    <a href="/E_library/book/{{$book->id}}">
                                        @if(!empty($book->img))
                                        <img src="{{asset('storage/'.$book->img)}}" alt="">
                                        @else
                                        <img src="{{ asset('build/assets/images/shop/book.webp')}}"  alt="">
                                        @endif
                                        <span class="product-title">{{$book->title}}</span>
                                    </a>

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
                                    </span><br>
                                    
                                    <div class="rating" style="display: inline-flex;">                                       
                                           @for ($i = 0; $i < $book->rating; $i++)
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            @endfor
                                                <!-- <span>No reviews yet</span> -->
                                                
                                    </div>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </section>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section id="q44" class="section-padding popular-course-slider ">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 ">
                <div class="section-heading center-heading">
                    <span class="subheading">OUR</span>
                    <h3>Latest Online Courses</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="course-slides owl-carousel owl-theme">
                    @foreach ($courses as $course)
                    <div class="course-block">
                        <div class="course-img">
                            <img src="{{asset('storage/'.$course->img)}}" style="width:250px; height: 180px;" alt="" class="img-fluid">
                            <span class="course-label">{{$course->level}}</span>
                        </div>

                        <div class="course-content">
                            <div class="course-price ">
                                @if ($course->regular_price && !$course->sale_price)
                                <span class=" font-medium text-gray-900"><span class="uppercase"> $
                                        {{ $course->regular_price }}</span></span>
                                @endif
                                @if ($course->regular_price && $course->sale_price)
                                <span class=" font-medium text-gray-900"><span class="line-through pr-2 text-gray-500" style="font-size:35px;">
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
                                        echo '<i class="fa fa-star"></i>';
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
                            <p style="max-height: 3.6em; overflow: hidden;">{{ $course->description}}</p>
                            <div class="course-footer d-lg-flex align-items-center justify-content-between">
                                <div class="course-meta">
                                    <span class="course-student"><i class="bi bi-group"></i>{{ $course->fake_students_enrolled }}</span>
                                    <span class="course-duration"><i class="bi bi-badge3"></i>{{ $course->nblessonsbycourses }} Lessons</span>
                                </div>

                                <div class="buy-btn"><a href="/course_detail/(int){{$course->id}}" class="btn btn-main-2 btn-small">Details</a></div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
                <!-- <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div> -->
            </div>
        </div>
</section>

@endsection
