@extends('layouts.app')
@section('title','Home')
@section('content')
<?php

use App\Models\Course;
use App\Models\review;
use App\Models\Book;

$bookcount = Book::count();
$reviews = review::limit(7)->get();

?>
<section class="banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
                <div class="banner-content center-heading">
                    <span class="subheading">Expert instruction</span>
                    <h1>Convenient easy way of learning new skills!</h1>
                    <a href="/course_list" class="btn btn-main"><i class="fa fa-list-ul mr-2"></i>our Courses </a>
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
                        <i style=" margin-right: 20px;" class="bi bi-badge2"></i>
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
                        <i style=" margin-right: 20px;" class="bi bi-book"></i>
                    </div>
                    <div class="feature-text">
                        <h4>BOOK LIBRARY & STORE</h4>
                        <a href="/E-Library" style="color: #FF1949;"><b>View More <i class="fa fa-angle-right ml-2"></i></b></a>
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
<section class="section-padding popular-course-slider">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course-slides owl-carousel owl-theme owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transition: all 0.25s ease 0s; width: 4338px; transform: translate3d(-2365px, 0px, 0px);">
                                <div class="owl-item cloned" style="width: 384.291px; margin-right: 10px;">
                                    <div class="course-block">
                                        <div class="course-img">
                                            <img  src="build/assets/images/course/course3.jpg" alt="" class="img-fluid">

                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 384.291px; margin-right: 10px;">
                                    <div class="course-block">
                                        <div class="course-img">
                                            <img src="build/assets/images/course/course3.jpg" alt="" class="img-fluid">
                                        </div>


                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 384.291px; margin-right: 10px;">
                                    <div class="course-block">
                                        <div class="course-img">
                                            <img src="build/assets/images/course/course3.jpg" alt="" class="img-fluid">
                                        </div>


                                    </div>
                                </div>
                                <div class="owl-item" style="width: 384.291px; margin-right: 10px;">
                                    <div class="course-block">
                                        <div class="course-img">
                                            <img src="build/assets/images/course/course3.jpg" alt="" class="img-fluid">
                                        </div>


                                    </div>
                                </div>
                                <div class="owl-item" style="width: 384.291px; margin-right: 10px;">
                                    <div class="course-block">
                                        <div class="course-img">
                                            <img src="build/assets/images/course/course3.jpg" alt="" class="img-fluid">
                                        </div>


                                    </div>
                                </div>
                                <div class="owl-item" style="width: 384.291px; margin-right: 10px;">
                                    <div class="course-block">
                                        <div class="course-img">
                                            <img src="build/assets/images/course/course3.jpg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                <div class="course-btn text-lg-right"><a href="/course_list" class="btn btn-main"><i class="fa fa-store mr-2"></i>All Courses</a></div>
            </div>
        </div>
        <div class="text-center">
            <ul class="course-filter" id="showCoursesBycategories">

            </ul>
        </div>

        <div class="row " id="showCourses">


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
                                <span class="counter h2">{{$nbCourses}} <span>
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
                            <i class="fas fa-book"></i>
                            <div class="count">
                                <span class="counter h2">{{$bookcount+100}}</span>
                            </div>
                            <p>More Than 100+ Books</p>
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

            @foreach($categorieByCourses as $categorieByCourse)
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-1">
                    <div class="category-icon">
                        <i class="bi bi-layer"></i>
                    </div>
                    <h4><a href="#">{{$categorieByCourse->title}}</a></h4>
                    <p>{{$categorieByCourse->nbCoursesByCategorie}} Courses</p>
                </div>
            </div>
            @endforeach
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
                    @foreach ($reviews as $review)
                    <div class="review-item">
                        <div class="client-info" style="height: 650px;">
                            <i class="bi bi-quote"></i>
                            <p >{{ $review->comments }}</p>
                            <div class="rating">
                                @for ($i = 0; $i < $review->rating; $i++)
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    @endfor
                            </div>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="build/assets/images/clients/picture2.jpg" style="width: 95px;height: 95px;" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                @if (!empty($review))
                                <h4></h4>
                                @else
                                <h4>{{ $review->user->name }}</h4>
                                @endif
                                <span class="designation">Students</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
<br>

<script>
    const showCoursesBycategories = document.getElementById('showCoursesBycategories');
    const categories = @json($categories);
    const courses = @json($courses);
    const categories_course = @json($categories_course);

    const categorie = categories.filter(category => {
        return categories_course.some(element => element.categorie_id === category.id);
    });

    let htmlC = '<li class="active mr-2"><a id="all" href="/" data-filter="*" data-category=""> All</a></li>';

    for (var i = 0; i < categorie.length; i++) {
        htmlC +=
            `<li class="mr-2"><a class='a' href="#" data-filter=".cat${categorie[i].id}" data-category="${categorie[i].id}">${categorie[i].title}</a></li>`;
    }

    showCoursesBycategories.innerHTML = htmlC;

    const categoriesLink = showCoursesBycategories.querySelectorAll('.a');

    categoriesLink.forEach(element => {
        element.addEventListener('click', function(event) {
            event.preventDefault();
            const categoryID = this.getAttribute('data-category');
            console.log(categoryID)
            const filteredCourses = courses.filter(course => {
                return categories_course.some(catCourse => {
                    return catCourse.course_id === course.id && catCourse
                        .categorie_id == categoryID;
                });
            });
            showCourses(filteredCourses);
        });
    });
    document.getElementById('all').addEventListener('click', function() {
        showCourses(courses)
    })

    function showCourses(table) {
        let htmlCu = '';
        for (var i = 0; i < table.length; i++) {
            htmlCu += `
    <div class="course-item cat1 cat3 col-lg-4 col-md-6" >
        <div class="course-block" >
            <div class="course-img">
                <img src="{{ asset('storage/') }}/${table[i].img}" alt="" style="width:350px; height: 280px;" class=" mx-auto d-block">
                <span class="course-label">${table[i].level}</span>
            </div>

            <div class="course-content">
                <div class="course-price ">
                    <span>
                        ${ table[i].regular_price && !table[i].sale_price ? `
                                    <span class="font-medium text-gray-900 uppercase">${table[i].regular_price} MAD</span>
                                ` : '' }
                        ${ table[i].regular_price && table[i].sale_price ? `
                                <span class=" font-medium text-gray-900">
                                        <span class="course-price" style="font-size:35px;">
                                           $ ${table[i].sale_price}
                                        </span>
                                        <span class="del">
                                            $ ${table[i].regular_price}
                                        </span>
                                    </span>` : '' }
                        ${ !table[i].regular_price && !table[i].sale_price ? `
                                    <span class="uppercase">Free</span>
                                ` : '' }
                    </span>
                </div>

                <h4><a href="#">${table[i].title}</a></h4>
                <div class="rating">
    ${table[i].rating == 1 ? `
            <!-- Render HTML for a review with a rating of 1 -->
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <span>${table[i].rating}.00</span>

            ` : ''}
    ${table[i].rating == 2 ? `
            <!-- Render HTML for a review with a rating of 2 -->
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <span>${table[i].rating}.00</span>

            ` : ''}
    ${table[i].rating == 3 ? `
            <!-- Render HTML for a review with a rating of 3 -->
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <span>${table[i].rating}.00</span>

            ` : ''}
    ${table[i].rating == 4 ? `
            <!-- Render HTML for a review with a rating of 4 -->
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <span>${table[i].rating}.00</span>

            ` : ''}
    ${table[i].rating == 5 ? `
            <!-- Render HTML for a review with a rating of 5 -->

            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
        <span>${table[i].rating}.00</span>

            ` : ''}

            ${table[i].rating == undefined || table[i].rating == null || table[i].rating == '' ?
            `
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
        <span>0.00</span>
            `:''
        }
</div>
                <p>${table[i].description}</p>

                <div class="course-footer d-lg-flex align-items-center justify-content-between">
                    <div class="course-meta">
                        <span class="course-student"><i class="bi bi-group"></i>${table[i].fake_students_enrolled}</span>
                        <span class="course-duration"><i class="bi bi-badge3"></i>${table[i].nblessonsbycourses} Lessons</span>
                    </div>

                    <div class="buy-btn"><a href="/course_detail/${table[i].id}" class="btn btn-main-2 btn-small">Details</a></div>

                </div>
            </div>
        </div>
    </div>
    `;
    }
            document.getElementById('showCourses').innerHTML = htmlCu
    }
    showCourses(courses)
</script>
@endsection
