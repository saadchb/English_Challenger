@extends('layouts.app')
@section('title','Home')
@section('content')
<?php

use App\Models\Course;

$course = Course::count();

?>
<section class="banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
                <div class="banner-content center-heading" >
                    <span  class="subheading">Expert instruction</span>
                    <h1>Convenient easy way of learning new skills!</h1>
                    <a href="#" class="btn btn-main"><i class="fa fa-list-ul mr-2"></i>our Courses </a>
                    <a href="#" class="btn btn-tp ">get Started <i class="fa fa-angle-right ml-2"></i></a>
                </div>
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>

<section class="feature">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-4 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i  style=" margin-right: 20px;" class="bi bi-badge2"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Learn from Industry Professionals</h4>
                        <a href="#" style="color: #FF1949;"><b>View More <i class="fa fa-angle-right ml-2"></i></b></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon ">
                        <i style=" margin-right: 20px;" class="bi bi-article"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Learn the Latest Top Skills</h4>
                        <a href="#" style="color: #FF1949;"><b>View More <i class="fa fa-angle-right ml-2"></i></b></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i style=" margin-right: 20px;" class="bi bi-headset"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Lifetime Access & Ongoing Support</h4>
                        <a href="#" style="color: #FF1949;"><b>View More <i class="fa fa-angle-right ml-2"></i></b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="about-img">
                    <img src="build/assets/images/bg/2-2.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="section-heading">
                    <span class="subheading">ABOUT US</span>
                    <h3>Welcome to EnglishChallenger</h3>
                </div>

                <div class="about-content">
                    Welcome to EnglishChallenger, your ultimate English Language destination! Immerse in engaging video quizzes focused on English language and culture, covering vocabulary, grammar, and pronunciation. Our goal is to make learning a thrilling challenge. Our website is exclusively dedicated to entertaining and educating beginners and those refining their English skills.

                    Join our immersive platform exploring vocabulary, grammar, idioms, expressions, and English culture. Dive into captivating quizzes, riddles, and scientific insights, tailored for curious minds. Elevate your English proficiency through our quizzes, exercises, and beginner-friendly content. Learning should be enjoyable; come learn and enjoy every moment with EnglishChallenger!
                </div>
            </div>
        </div>
    </div>
</section>

<!--course section end-->



<!--course section start-->
<section class="section-padding video-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading text-center center-heading">
                    <span class="subheading">Working Process</span>
                    <h3>Watch video to know more about us</h3>
                </div>
                <!-- Embed YouTube Video -->

            </div>
        </div>
    </div>

    <div class="row align-items-center justify-content-center">
        <div class="col-lg-10">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/90dMLavEFOM" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    </div>
    <!--course-->
</section>
<!--course section end-->
<!--course section start-->


<section class="section-padding popular-course bg-grey">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <span class="subheading">Top Trending Courses</span>
                    <h3>Our Popular Online Courses</h3>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="course-btn text-lg-right"><a href="#" class="btn btn-main"><i class="fa fa-store mr-2"></i>All Courses</a></div>
            </div>
        </div>
        <div class="text-center">
            <ul class="course-filter">
                <li class="active"><a href="#" data-filter="*"> All</a></li>
                <li><a href="#" data-filter=".cat1">printing</a></li>
                <li><a href="#" data-filter=".cat2">Web</a></li>
                <li><a href="#" data-filter=".cat3">illustration</a></li>
                <li><a href="#" data-filter=".cat4">media</a></li>
                <li><a href="#" data-filter=".cat5">crafts</a></li>
            </ul>
        </div>

        <div class="row course-gallery ">
            @foreach($courses as $course)
            <div class="course-item cat1 cat3 col-lg-4 col-md-6">
                <div class="course-block">
                    <div class="course-img">
                        <img src="{{ asset('storage/'.$course->img) }}" style="width: 400px; ;height: 285px;" alt="" class="img-fluid">
                        <span class="course-label">{{$course->level}}</span>
                    </div>

                    <div class="course-content">
                        <div class="course-price ">
                            <span><span class=" font-medium text-gray-900">
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
                                </span></span></h4>
                        </div>

                        <h4><a href="#">{{$course->title}}</a></h4>
                        <div class="rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <span>(5.00)</span>
                        </div>
                        <p>{{$course->description}}</p>

                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>{{$course->nblessonsbycourse()}} Lessons</span>
                            </div>

                            <div class="buy-btn"><a href="{{route('Courses.show',$course->id)}}" class="btn btn-main-2 btn-small">Details</a></div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
    </div>
    </div>
</section>
<section class="counter-wrap mt--105">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 counter-inner">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-item">
                            <i class="ti-desktop"></i>
                            <div class="count">
                                <span class="counter h2">90</span>
                            </div>
                            <p>Expert Instructors</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-item">
                            <i class="ti-agenda"></i>
                            <div class="count">
                                <span class="counter h2">{{$course->nbcourses()}} <span>
                            </div>
                            <p>Total Courses</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="counter-item">
                            <i class="ti-heart"></i>
                            <div class="count">
                                <span class="counter h2">5697</span>
                            </div>
                            <p>Happy Students</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="counter-item">
                            <i class="ti-microphone-alt"></i>
                            <div class="count">
                                <span class="counter h2">24</span>
                            </div>
                            <p>Creative Events</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding category-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading">
                    <span class="subheading">Top Categories</span>
                    <h3>Our Top Categories</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-1">
                    <div class="category-icon">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <h4><a href="#">Web Development</a></h4>
                    <p>4 Courses</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-2">
                    <div class="category-icon">
                        <i class="bi bi-layer"></i>
                    </div>
                    <h4><a href="#">Design</a></h4>
                    <p>12 Courses</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-3">
                    <div class="category-icon">
                        <i class="bi bi-target-arrow"></i>
                    </div>
                    <h4><a href="#">Marketing</a></h4>
                    <p>6 Courses</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="course-category style-4">
                    <div class="category-icon">
                        <i class="bi bi-rocket2"></i>
                    </div>
                    <h4><a href="#">Art & Design</a></h4>
                    <p>6 Courses</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-2">
                    <div class="category-icon">
                        <i class="bi bi-shield"></i>
                    </div>
                    <h4><a href="#">Design</a></h4>
                    <p>12 Courses</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-1">
                    <div class="category-icon">
                        <i class="bi bi-slider-range"></i>
                    </div>
                    <h4><a href="#">Web Development</a></h4>
                    <p>4 Courses</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="course-category style-4">
                    <div class="category-icon">
                        <i class="bi bi-bulb"></i>
                    </div>
                    <h4><a href="#">Art & Design</a></h4>
                    <p>6 Courses</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-3">
                    <div class="category-icon">
                        <i class="bi bi-android"></i>
                    </div>
                    <h4><a href="#">Marketing</a></h4>
                    <p>6 Courses</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mt-5">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    <div class="course-btn mt-4"><a href="#" class="btn btn-main"><i class="fa fa-grip-horizontal mr-2"></i>All Categories</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="testimonial section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading text-center">
                    <span class="subheading">Testimonials</span>
                    <h3>Learn New Skills to Go Ahead for Your Career</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="testimonials-slides owl-carousel owl-theme">
                    <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>I've thoroughly enjoyed my time on this website. The lessons are well-structured and easy to follow. The practical exercises have really helped me improve my English skills. The teachers are very attentive and responsive. I highly recommend this site to anyone looking to learn English effectively and enjoyably!"</p>
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="build/assets/images/clients/picture4.jpg" style="width: 95px;height: 95px;" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>Salma Nadim</h4>
                                <span class="designation">Student</span>
                            </div>
                        </div>
                    </div>

                    <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>As a teacher on this site, I'm delighted to be able to help students improve their English. The platform offers many pedagogical tools that make teaching easier, such as interactive quizzes, videos, and practical exercises. Additionally, the support team is always there to answer my questions and provide support. I'm grateful to be part of this dynamic learning community.</p>
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="build/assets/images/clients/picture2.jpg" style="width: 95px;height: 95px;"  alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>ouazza monir</h4>
                                <span class="designation">Teacher</span>
                            </div>
                        </div>
                    </div>


                    <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>I've been using this site for a few months now  a great way to interact with other learners and practice the language. I feel much more confident in my English skills thanks to this site.</p>
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="build/assets/images/clients/picture2.jpg" style="width: 95px;height: 95px;"  alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>Anwar Nourri</h4>
                                <span class="designation">Student</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading">
                    <span class="subheading">Blog News</span>
                    <h3>Latest Blog News</h3>
                    <p>take an eye on our new and recommended blogs written by a professional writers!</p>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <img src="build/assets/images/blog/blog1.png" alt="blog 1" class="img-fluid">
                    <div class="blog-content">
                        <div class="entry-meta">
                            <span><i class="fa fa-calendar-alt"></i>May 19, 2022</span>
                            <span><i class="fa fa-comments"></i>150 comment</span>
                        </div>
                        <h2><a href="#">The British English Challenge</a></h2>
                        <p> "Ready for a taste of British English?
                            Our inaugural challenge begins July 31st. From classic expressions to regional dialects,
                            here's your chance to explore the rich tapestry of British linguistic heritage . Stay tuned for details!"</p>

                        <a href="#" class="btn btn-main btn-small"><i class="fa fa-plus-circle mr-2"></i>Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <img src="build/assets/images/blog/blog2.png" alt="blog 2" class="img-fluid">
                    <div class="blog-content">
                        <div class="entry-meta">
                            <span><i class="fa fa-calendar-alt"></i>April 22, 2023</span>
                            <span><i class="fa fa-comments"></i>85 comment</span>
                        </div>

                        <h2><a href="#">Happy 4th Birthday to English Learning for Curious Minds</a></h2>
                        <p>English Learning for Curious Minds was first published 4 years ago today. Here is a summary of how things have gone since then, and the main things we've done in 2023.</p>

                        <a href="#" class="btn btn-main btn-small"><i class="fa fa-plus-circle mr-2"></i>Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <img src="build/assets/images/blog/blog3.png" alt="blog 3" class="img-fluid">
                    <div class="blog-content">
                        <div class="entry-meta">
                            <span><i class="fa fa-calendar-alt"></i>Mars 5, 2024</span>
                            <span><i class="fa fa-comments"></i>16 comment</span>
                        </div>

                        <h2><a href="#">24 Unorthodox Ways To Stick To Your English Learning Goals in 2024</a></h2>
                        <p>Learning English is hard, and one of the hardest things about it is staying motivated. Here are 24 ways that you can stay motivated and hit your goals.</p>

                        <a href="#" class="btn btn-main btn-small"><i class="fa fa-plus-circle mr-2"></i>Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="feature-2">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-badge2"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Expert Teacher</h4>
                        <p>Offre the unparalleled caliber of educators who ignite curiosity,
                            and champion student success like no other.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-article"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Quality Education</h4>
                        <p>We provide essential quality education for personal development and societal advancement.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Life Time Support</h4>
                        <p>Ensuring ongoing assistance and care for our valued customers.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-rocket2"></i>
                    </div>
                    <div class="feature-text">
                        <h4>HD Video</h4>
                        <p>HD Video provides unparalleled clarity and detail.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <br>
<section class="cta-2">
    <div class="container">
        <div class="row align-items-center subscribe-section ">
            <div class="col-lg-6">
                <div class="section-heading white-text">
                    <span class="subheading">Newsletter</span>
                    <h3>Join our community of students</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="subscribe-form">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Email Address">
                        <a href="#" class="btn btn-main">Subscribe<i class="fa fa-angle-right ml-2"></i> </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection