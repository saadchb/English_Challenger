@extends('layouts.app')
@section('title', 'detail course')
@section('content')
<?php

use App\Models\Book;
use App\Models\Course;
use App\Models\review;
use App\Models\Student;
use App\Models\Teacher;

$books = Book::join('reviews', 'books.id', '=', 'reviews.book_id')->paginate(5);
// $books = Book::limit(3)->get();
$review = review::all();
$teachers = Teacher::all();
$studentR = Student::all();

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
                                <i class="fa fa-user"></i><span>{{ $course->fake_students_enrolled == null ? 0 : $course->fake_students_enrolled }}
                                    Students Enrolled</span>
                            </div>
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
                                    <span> Total learning: <strong>{{ $nblessonsbycourse }}
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
                                                    @if (count($curriculum->lessons) !== 0)
                                                    <div class="single-course-lesson">
                                                        <div class="course-topic-lesson">
                                                            <ol>
                                                                @foreach ($lessonsMix as $lesson)
                                                                @if ($lesson['curriculum_id'] == $curriculum->id && $lesson['type'] == 'lesson')
                                                                <li>
                                                                    <form action="{{ route('curricula.show', $course->id) }}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" value="{{ $lesson['id'] }}" name="lesson_id" />
                                                                        <input type="hidden" value="{{ $lesson['type'] }}" name="type" />
                                                                        <svg class="ml-1" width="17px" height="17px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M12 10.4V20M12 10.4C12 8.15979 12 7.03969 11.564 6.18404C11.1805 5.43139 10.5686 4.81947 9.81596 4.43597C8.96031 4 7.84021 4 5.6 4H4.6C4.03995 4 3.75992 4 3.54601 4.10899C3.35785 4.20487 3.20487 4.35785 3.10899 4.54601C3 4.75992 3 5.03995 3 5.6V16.4C3 16.9601 3 17.2401 3.10899 17.454C3.20487 17.6422 3.35785 17.7951 3.54601 17.891C3.75992 18 4.03995 18 4.6 18H7.54668C8.08687 18 8.35696 18 8.61814 18.0466C8.84995 18.0879 9.0761 18.1563 9.29191 18.2506C9.53504 18.3567 9.75977 18.5065 10.2092 18.8062L12 20M12 10.4C12 8.15979 12 7.03969 12.436 6.18404C12.8195 5.43139 13.4314 4.81947 14.184 4.43597C15.0397 4 16.1598 4 18.4 4H19.4C19.9601 4 20.2401 4 20.454 4.10899C20.6422 4.20487 20.7951 4.35785 20.891 4.54601C21 4.75992 21 5.03995 21 5.6V16.4C21 16.9601 21 17.2401 20.891 17.454C20.7951 17.6422 20.6422 17.7951 20.454 17.891C20.2401 18 19.9601 18 19.4 18H16.4533C15.9131 18 15.643 18 15.3819 18.0466C15.15 18.0879 14.9239 18.1563 14.7081 18.2506C14.465 18.3567 14.2402 18.5065 13.7908 18.8062L12 20" stroke="#07294D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>
                                                                        <button id="submit_btn" class="btn">{{ $lesson['title'] }}</button>
                                                                    </form>
                                                                </li>
                                                                @endif
                                                                @if ($lesson['curriculum_id'] == $curriculum->id && $lesson['type'] == 'quiz')
                                                                <li>
                                                                    <form action="{{ route('curricula.show', $course->id) }}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" value="{{ $lesson['id'] }}" name="lesson_id" />
                                                                        <input type="hidden" value="{{ $lesson['type'] }}" name="type" />
                                                                        <svg fill="#07294D" width="15px" height="15px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M960 112.941c-467.125 0-847.059 379.934-847.059 847.059 0 467.125 379.934 847.059 847.059 847.059 467.125 0 847.059-379.934 847.059-847.059 0-467.125-379.934-847.059-847.059-847.059M960 1920C430.645 1920 0 1489.355 0 960S430.645 0 960 0s960 430.645 960 960-430.645 960-960 960m417.905-575.955L903.552 988.28V395.34h112.941v536.47l429.177 321.77-67.765 90.465Z" fill-rule="evenodd" />
                                                                        </svg>
                                                                        <button id="submit_btn" class="btn"><span>{{ $lesson['title'] }}</span>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                                @endif
                                                                @endforeach
                                                            </ol>
                                                        </div>
                                                    </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @if (count($curricula) == 0)
                                        No curriculum for this course
                                        @endif
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
                                <h4 class="course-title"><i class="fas fa-comments" aria-hidden="true"></i> Book Feedback</h4>

                                @if($reviews->isEmpty())
                                <div class="course-review-wrapper">
                                    <div class="course-review">
                                        <p>There are no reviews yet.</p><br>
                                        <h2>Be the first to review “{{$course->title}}”</h2>
                                        <p>You must be logged in to post a review.</p>
                                    </div>
                                </div>
                                @else
                                @livewire('reviewscourse',[$course->id])                                                        

                                @endif

                            </div>
                        </div>
                    <div class="comments-form p-5 mt-6" style="margin-top: 140px !important;">
                        <h3>Leave a comment </h3>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <form action="{{ route('course.store') }}" class="comment_form" method="Post" enctype="multipart/form-data">
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
                                            <span class="gd-rating-text badge badge-light border" style="font-size: larger;" data-title="Select a rating">Select a
                                                rating</span>
                                            <!-- Hidden input field to store selected rating -->
                                            <input type="hidden" id="rating" name="rating">
                                        </div>
                                        <span class="gd-rating-label font-weight-bold fw-bold p-0 m-0">Overall</span>
                                    </div>
                                </div>
                                <br>
                                @error('rating')
                                <div style="color: red;">{{ $message }}</div><br>
                                @enderror

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="comments" id="msgt" cols="30" rows="6" placeholder="Comment" class="form-control"></textarea>
                                    </div>
                                </div><br>
                                @error('comments')
                                <div style="color: red;">{{ $message }}</div><br>
                                @enderror
                                <input type="number" name="course_id" hidden value="{{ $course->id }}">
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
                                <div style="color: red;">{{ $message }}</div><br>
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
                                <div style="color: red;">{{ $message }}</div><br>
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
                                                    $ {{ $course->sale_price }}
                                                </span>
                                                <span class="del" style="font-size:35px;">
                                                    $ {{ $course->regular_price }}
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


                    <div class="course-widget single-info">
                        <i class="bi bi-group"></i>
                        Enrolled
                        <span>{{ $course->fake_students_enrolled == null ? 0 : $course->fake_students_enrolled }}
                            Students</span>
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
                                    {{ $nblessonsbycourse }}
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
                        <span>Share :</span>
                        <ul class="social-share list-inline">
                            <li class="list-inline-item"><a href="#" class="share-btn" data-platform="facebook"><i class="fab fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="share-btn" data-platform="twitter"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="share-btn" data-platform="linkedin"><i class="fab fa-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="share-btn" data-platform="pinterest"><i class="fab fa-pinterest"></i></a></li>
                        </ul>
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
                            @if (count($requirements) == 0)
                            Great news! There <span style="color:#FF1949;">are no specific</span> requirements
                            <span style="color:#FF1949;">for</span> this course. Dive <span style="color:#FF1949;">right in </span> embark<span style="color:#FF1949;">
                                on</span> your learning journey worry-<span style="color:#FF1949;">free!</span>
                            @endif

                        </ul>
                    </div>

                    <div class="course-widget">
                        <h4 class="course-title">Tags</h4>
                        <div class="single-course-tags">
                            @foreach ($tags as $tag)
                            <a href="#">{{ $tag->title }}</a>
                            @endforeach
                            @if (count($tags) == 0)
                            No tags available for this course.
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="section-padding related-course">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h4>Related Courses You may Like</h4>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($courses as $course)
            <div class="col-lg-4 col-md-6">
                <div class="course-block">
                    <div class="course-img">
                        <img src="{{ asset('storage/' . $course->img) }}" style="width:350px; height: 280px;" alt="" class="img-fluid">
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
            @if (count($courses) == 0)
            Explore beyond! While there are currently no related courses available, this presents an opportunity to
            discover new topics and broaden your horizons. Stay curious, and let your learning journey lead you to
            exciting new opportunities!
            @endif
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Add click event listener to all share buttons
        var shareButtons = document.querySelectorAll(".share-btn");
        shareButtons.forEach(function(button) {
            button.addEventListener("click", function(event) {
                event.preventDefault();
                var platform = this.getAttribute("data-platform");
                // Call function to share based on selected platform
                shareTo(platform);
            });
        });

        // Function to handle sharing based on selected platform
        function shareTo(platform) {
            // Define sharing URLs for different platforms
            var shareURLs = {
                "facebook": "https://www.facebook.com/sharer/sharer.php?u=" + window.location.href,
                "twitter": "https://twitter.com/share?url=" + window.location.href,
                "linkedin": "https://www.linkedin.com/shareArticle?url=" + window.location.href,
                "pinterest": "https://pinterest.com/pin/create/button/?url=" + window.location.href
            };
            // Open sharing window for selected platform
            window.open(shareURLs[platform], "_blank", "width=600,height=400");
        }
    });
</script>
@endsection