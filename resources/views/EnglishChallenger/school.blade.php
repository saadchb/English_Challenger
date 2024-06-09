@extends('layouts.app')
@section('title', 'Schools')
@section('content')

<?php

use App\Models\Course;
use App\Models\review;

// $review = review::all();
$courses = Course::query()->latest()->paginate(4);
?>
<section class="page-wrapper edutim-course-single course-single-style-3">
    <div id="333" class="course-single-wrapper" style="background-image: url('{{ $school->school_photo }}') !important;" onerror="this.style.backgroundImage = 'url({{ Storage::url($school->school_photo)}})';">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course-single-header white-text">
                        <br><br>
                        <span class="subheading">{{$school->school_city}}</span>
                        <h3 class="single-course-title">{{$school->school_name}}</h3>

                        <div class="d-flex align-items-center ">
                            <div class="single-top-meta">
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol"><i class='fas fa-phone'></i></span>
                                    {{$school->phone_number}}</span><span style="color: #FF1949;"> | </span>
                            </div>
                            <div class="single-top-meta">
                                <div class="rating">
                                    <?php
                                    $totalRating = 0;
                                    $count = 0;
                                    foreach ($reviews as $rev) {
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
                            </div><br>

                        </div>
                        <div class="single-top-meta">
                            <span class="woocommerce-Price-currencySymbol"><i class="far fa-envelope"></i></span>
                            {{$school->email}}</span>

                        </div>
                        <div class="single-top-meta">
                            <span class="woocommerce-Price-currencySymbol"><i class='fas fa-map-marker-alt'></i></span>
                            {{$school->adresse}}</span>

                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <button style="float: right;"><a href="#q44">WRITE A REVIEW</a></button>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <nav class="course-single-tabs">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-instructor-tab" data-toggle="tab" href="#nav-instructor" role="tab" aria-controls="nav-home" aria-selected="true"> School</a>
                        <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-contact" aria-selected="false"> Photos</a>
                        <a class="nav-item nav-link" id="nav-feedback-tab" data-toggle="tab" href="#nav-feedback" role="tab" aria-controls="nav-contact" aria-selected="false"> Reviews</a>

                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="single-course-details ">
                            <div class="course-widget course-info">
                                <h4 class="course-title"><i class="fas fa-image" aria-hidden="true"></i> Images </h4>
                                <ul>
                                    <li>

                                        <img src="{{ asset('storage/'. $school->school_photo)}}" onerror="this.onerror=null;this.src='{{ $school->school_photo }}';" class="img-fluid" width="735" height="384" class="align size-medium_large geodir-image-0 embed-responsive-item embed-item-cover-xy w-100 p-0 m-0 mw-100 border-0">
                                    </li>
                                    @foreach ($reviews as $rev)
                                    @if ($rev->school_id == $school->id && $rev->school_photos)
                                    <li>
                                        <img src="{{ asset('storage/'.$rev->school_photos)}}" class="img-fluid" width="735" height="384" class="align size-medium_large geodir-image-0 embed-responsive-item embed-item-cover-xy w-100 p-0 m-0 mw-100 border-0">
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- school about -->
                    <div class="tab-pane fade show active" id="nav-instructor" role="tabpanel" aria-labelledby="nav-instructor-tab">
                        <div class="course-widget course-info">
                            <h4 class="course-title">About the school</h4>
                            <div class="instructor-profile">

                                <div class="profile-info">
                                    <h5>{{$school->school_name}}</h5><bR>
                                    <div class="rating">
                                        <?php
                                        $totalRating = 0;
                                        $count = 0;
                                        foreach ($reviews as $rev) {
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

                                    <p>{{$school->description}}</p>
                                    <div class="instructor-courses">
                                        <span><i class="bi bi-folder"></i>4 Courses</span>
                                        <span><i class="bi bi-group"></i>HeadMaster: {{$school->name_headmaster}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- reviews -->
                    <div class="tab-pane fade" id="nav-feedback" role="tabpanel" aria-labelledby="nav-feedback-tab">
                        <div class="course-widget course-info">
                            <h4 class="course-title"><i class="fas fa-comments" aria-hidden="true"></i> Book Feedback</h4>

                            @if($reviews->isEmpty())
                            <div class="course-review-wrapper">
                                <div class="course-review">
                                    <p>There are no reviews yet.</p><br>
                                    <h2>Be the first to review “{{$book->title}}”</h2>
                                    <p>You must be logged in to post a review.</p>
                                </div>
                            </div>
                            @else
                            @livewire('reviewsschool',[$school->id])

                            @endif
                        </div>
                    </div>
                </div><br>
                <!-- comments -->
                <div class="comments-form p-5 mt-4">
                    <h3>Leave a comment </h3>
                    <p>Your email address will not be published. Required fields are marked *</p>
                    <form action="{{route('course.store')}}" class="comment_form" method="Post" enctype="multipart/form-data">
                        @csrf
                        @if (Auth::guard('teacher')->check())
                        <input type="hidden" name="teacher_id" value="{{Auth::guard('teacher')->user()->id}}">
                        @elseif (Auth::guard('student')->check())
                        <input type="hidden" name="student_id" value="{{Auth::guard('student')->user()->id}}">
                        @endif
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
                            <!-- @error('rating')
                            <div style="color: red;">{{$message}}</div><br>
                            @enderror -->
                            <div class="col-lg-12">
                                <input class="form-control form-control-lg" id="formFileLg" name="school_photos" type="file" style="direction: rtl;"><br>
                            </div>
                            @error('school_photos')
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
                            <input type="number" name="school_id" hidden value="{{$school->id}}">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="website" placeholder="Website">
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    @if (Auth::guard('teacher')->check())
                                    <input type="text" name="name" class="form-control" value="{{Auth::guard('teacher')->user()->first_name}} {{Auth::guard('teacher')->user()->last_name}}"><br>
                                    @elseif (Auth::guard('student')->check())
                                    <input type="text" name="name" class="form-control" value="{{Auth::guard('student')->user()->first_name}} {{Auth::guard('student')->user()->last_name}}"><br>
                                    @else
                                    <input type="text" name="name" class="form-control" placeholder="Name"><br>
                                    @endif
                                </div>
                            </div><br>
                            @error('name')
                            <div style="color: red;">{{$message}}</div><br>
                            @enderror
                            <div class="col-lg-6">
                                <div class="form-group">
                                    @if (Auth::guard('teacher')->check())
                                    <input type="text" name="email" class="form-control" value="{{Auth::guard('teacher')->user()->email}}"><br>
                                    @elseif (Auth::guard('student')->check())
                                    <input type="text" name="email" class="form-control" value="{{Auth::guard('student')->user()->email}}"><br>
                                    @else
                                    <input type="text" name="email" class="form-control" placeholder="Email"><br>
                                    @endif
                                </div>
                            </div><br>
                            @error('email')
                            <div style="color: red;">{{$message}}</div><br>
                            @enderror
                            <div class="col-lg-12">
                                <div class="form-group">
                                    @if (Auth::guard('teacher')->check() || Auth::guard('student')->check())
                                    <button type="submit" class="btn btn-main">Comment</button>
                                    @else
                                    <button type="submit" disabled class="btn btn-main">Comment</button><br>
                                    must be logged in for leave a comment 
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <!-- side bar  -->
                <div class="blog-sidebar mt-5 mt-lg-0 mt-md-0">
                    <!-- CLAIM THIS BUSINESS button  -->
                    <div class="widget widget_news">
                        {{-- <form action="{{route('loginShoolForm')}}" method="post">
                        @csrf --}}
                        <a style="color:white;" href="{{route('loginShoolForm')}}">
                        <button type="submit"  style=" margin-left: 35px !important;background-color: #862b84;justify-content: center !important; align-items: center;"><a style="color:white;" href="{{route('loginShoolForm')}}">CLAIM THIS BUSINESSE
                         </button><br></a>
                    {{-- </form> --}}
                    </div>
                    <!-- profile  -->
                    <div class="widget widget_news">
                        <h4 class="widget-title">Sig in to your profile</h4>

                        <div style="margin-left: 90px !important; justify-content: center !important; align-items: center;">
                            <img src="{{asset('build/assets/images/clients/user.png')}}" style="width:130px;height:130px; border-radius: 100%;" alt="" class="img-fluid">
                        </div><br>

                        <button style="  margin-left: 97px !important;justify-content: center !important; align-items: center;"><i class="fas fa-user mr-2"></i>profile</button>
                    </div>
                    <!-- school information  -->
                    <div class="widget widget_categories">
                        <h4 class="widget-title">Categories</h4>
                        <ul>
                            <li class="cat-item">
                                <div class="geodir_post_meta list-group-item list-group-item-action  geodir-field-phone">
                                    <span class="geodir_post_meta_icon geodir-i-phone" style="">
                                        <i class="fas fa-phone fa-fw" aria-hidden="true"></i>
                                        <span class="geodir_post_meta_title ">Phone: {{$school->phone_number}}</span></span>

                                </div>
                            </li>
                            <li class="cat-item">
                                <div class="geodir_post_meta list-group-item list-group-item-action  geodir-field-phone">
                                    <span class="geodir_post_meta_icon geodir-i-phone" style="">
                                        <i class='fas fa-map-marker-alt'></i>
                                        <span class="geodir_post_meta_title ">Adress: {{$school->adresse}}</span></span>
                                </div>
                            </li>
                            <li class="cat-item">
                                <div class="geodir_post_meta list-group-item list-group-item-action  geodir-field-phone">
                                    <span class="geodir_post_meta_icon geodir-i-phone" style="">
                                        <i class="far fa-envelope"></i>
                                        <span class="geodir_post_meta_title ">email: {{$school->email}}</span></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
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

                            <h4><a href="/course_detail/(int){{$course->id}}">{{ $course->title }}</a></h4>
                            <div class="rating">
                                <?php
                                $totalRating = 0;
                                $count = 0;
                                foreach ($reviews as $rev) {
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
            </div>
        </div>
</section>

@endsection