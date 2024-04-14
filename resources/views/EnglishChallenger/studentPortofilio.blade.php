@extends('layouts.app')
@section('title', 'Course list')
@section('content')


    <section class="edutim-course-single">
        <div class="course-single-wrapper">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="course-single-header white-text">
                            <span class="subheading">{{ $student->class }}</span>
                            <h3 class="single-course-title text-capitalize">
                                {{ $student->first_name }} {{ $student->last_name }}
                            </h3>

                            <p>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4" id="imgProf">
                        <div>
                            <img style="border-radius: 200px;" src="{{ asset('storage/' . $student->picture) }}"
                                alt="" class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="team-block">
                        <div style="height:2 rem !important;" >
                            <img  style="height: 100%;" src="https://listival.com/wp-content/plugins/userswp/assets/images/banner.png" alt="" class="img-fluid">
                        </div>
                        <div style="background-color:transparent !important; box-shadow:0 0 0 rgb(255, 254, 254) !important;margin-top:-104px !important;" class="team-info">

                            <img  style="border-radius:50%; width:30%;box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important; " src="{{ asset('storage/' . $student->picture) }}"alt="">
                        </br>
                            <h4 style="font-size: 20px; color:#07294D !important; "
                            class="d-inline-block text-capitalize mt-4">{{ $student->first_name }}
                            {{ $student->last_name }}</h4>
                        </div>

                    </div>


                    <nav class="course-single-tabs pt-5">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                            <a class="nav-item nav-link" id="nav-topics-tab" data-toggle="tab" href="#nav-topics"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Courses</a>
                            <a class="nav-item nav-link" id="nav-instructor-tab" data-toggle="tab" href="#nav-instructor"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Books</a>
                            <a class="nav-item nav-link" id="nav-feedback-tab" data-toggle="tab" href="#nav-feedback"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Certificates</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" style="display:flex;flex-wrap: wrap;" id="nav-home"
                            role="tabpanel" aria-labelledby="nav-home-tab">
                            <div style="width:100%;">
                                <h2 class="woocommerce-loop-product__title">
                                    Courses
                                </h2>
                            </div>
                            @foreach ($courses as $item)
                                <div class="course-item cat1 cat3 col-lg-6 col-md-6">
                                    <div class="course-block">
                                        <div class="course-img">
                                            <img src="{{ asset('storage/' . $item->img) }}" alt=""
                                                style="width:350px; height: 280px;" class="img-fluid mb-1 ">
                                            <span class="course-label">{{ $item->level }}</span>
                                        </div>

                                        <div class="course-content">
                                            <h4><a href="/course_detail/{{ $item->id }}"
                                                    title="click to show details for this course">{{ $item->title }}</a>
                                            </h4>
                                            <div class="rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <a href="#"><i
                                                            class="fa fa-star{{ $i <= $item->rating ? '' : ' text-secondary' }}"></i></a>
                                                @endfor
                                                <span>{{ $item->rating ?? '0' }}.00</span>
                                            </div>
                                            <p>{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <div>
                                <h2 class="woocommerce-loop-product__title">
                                    Books
                                </h2>
                                <ul class="products columns-4 " style="display: flex;flex-wrap:wrap !important;">

                                    @if ($books->isEmpty())
                                        <!-- Display error message -->
                                        <div class="error-page text-center error-404 not-found">
                                            <div class="error-message">
                                                <h3>Oops... Not Found!</h3>
                                            </div>
                                            <div class="error-content">
                                                Try click on button to back to books<br>
                                                <a href="/E_Library" class="btn" style="background-color: #862b84;">Back
                                                    to books
                                                    Page</a>
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($books as $book)
                                            <li class="product ml-4">
                                                <div class="product-wrap">
                                                    <a href="#" class="">
                                                        @if (!empty($book->img))
                                                            <img style="width: 150px !important;height:150px !important;"
                                                                src="{{ asset('storage/' . $book->img) }}" alt="">
                                                        @else
                                                            <img style="width: 150px !important;height:150px !important;"src="{{ asset('build/assets/images/shop/book.webp') }}"
                                                                alt="">
                                                        @endif
                                                    </a>
                                                    <div class="product-btn-wrap">
                                                        <a href="#"
                                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                                                            <i class="fa fa-shopping-basket"></i>
                                                        </a>
                                                        <a href="#" class="button wish-list"><i
                                                                class="fa fa-eye"></i></a>
                                                    </div>
                                                </div>
                                                <div class="woocommerce-product-title-wrap">
                                                    <h4>
                                                        <a href="#">{{ $book->title }}</a>
                                                    </h4>
                                                </div>
                                                <!-- <span class="onsale">Sale!</span> -->


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
                            </div>
                        </div>
                        <div class="tab-pane fade" style="display:flex;flex-wrap: wrap;" id="nav-topics" role="tabpanel"
                            aria-labelledby="nav-topics-tab">

                            @foreach ($courses as $item)
                                <div class="course-item cat1 cat3 col-lg-6 col-md-6">
                                    <div class="course-block">
                                        <div class="course-img">
                                            <img src="{{ asset('storage/' . $item->img) }}" alt=""
                                                style="width:350px; height: 280px;" class="img-fluid mb-1 ">
                                            <span class="course-label">{{ $item->level }}</span>
                                        </div>

                                        <div class="course-content">
                                            <h4><a href="/course_detail/{{ $item->id }}"
                                                    title="click to show details for this course">{{ $item->title }}</a>
                                            </h4>
                                            <div class="rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <a href="#"><i
                                                            class="fa fa-star{{ $i <= $item->rating ? '' : ' text-secondary' }}"></i></a>
                                                @endfor
                                                <span>{{ $item->rating ?? '0' }}.00</span>
                                            </div>
                                            <p>{{ $item->description }}</p>


                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!--  COurse Topics End -->
                        </div>
                        <div class="tab-pane fade" id="nav-instructor" role="tabpanel"
                            aria-labelledby="nav-instructor-tab">
                            <div class="course-widget course-info">
                                <ul class="products columns-4 " style="display: flex;flex-wrap:wrap !important;">
                                    @if ($books->isEmpty())
                                        <!-- Display error message -->
                                        <div class="error-page text-center error-404 not-found">
                                            <div class="error-message">
                                                <h3>Oops... Not Found!</h3>
                                            </div>
                                            <div class="error-content">
                                                Try click on button to back to books<br>
                                                <a href="/E_Library" class="btn"
                                                    style="background-color: #862b84;">Back to books
                                                    Page</a>
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($books as $book)
                                            <li class="product ml-4">
                                                <div class="product-wrap">
                                                    <a href="#" class="">
                                                        @if (!empty($book->img))
                                                            <img style="width: 150px !important;height:150px !important;"
                                                                src="{{ asset('storage/' . $book->img) }}"
                                                                alt="">
                                                        @else
                                                            <img style="width: 150px !important;height:150px !important;"src="{{ asset('build/assets/images/shop/book.webp') }}"
                                                                alt="">
                                                        @endif
                                                    </a>
                                                    <div class="product-btn-wrap">
                                                        <a href="#"
                                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart">
                                                            <i class="fa fa-shopping-basket"></i>
                                                        </a>
                                                        <a href="#" class="button wish-list"><i
                                                                class="fa fa-eye"></i></a>
                                                    </div>
                                                </div>
                                                <div class="woocommerce-product-title-wrap">
                                                    <h4>
                                                        <a href="#">{{ $book->title }}</a>
                                                    </h4>
                                                </div>
                                                <!-- <span class="onsale">Sale!</span> -->
                                                <span class="price">
                                                    @if ($book->regular_price && !$book->sale_price)
                                                        <span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">$</span>{{ $book->regular_price }}</span>
                                                    @endif

                                                    @if ($book->regular_price && $book->sale_price)
                                                        <del><span class="woocommerce-Price-amount amount"><span
                                                                    class="woocommerce-Price-currencySymbol">$
                                                                </span>{{ $book->sale_price }}</span></del>
                                                        <ins><span><span style="text-decoration: none;"> $
                                                                </span>{{ $book->regular_price }}</span></ins>
                                                    @endif

                                                    @if (!$book->regular_price && !$book->sale_price)
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
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-feedback" role="tabpanel" aria-labelledby="nav-feedback-tab">
                            <div class="course-widget course-info">
                                <h4 class="course-title">
                                    Students Feedback
                                </h4>

                                <div class="course-review-wrapper">
                                    <div class="course-review">
                                        <div class="profile-img">
                                            <img src="assets/images/blog/author.jpg" alt="" class="img-fluid" />
                                        </div>
                                        <div class="review-text">
                                            <h5>
                                                Mehedi Rasedh
                                                <span>26th june 2020</span>
                                            </h5>

                                            <div class="rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star-half"></i></a>
                                            </div>
                                            <p>
                                                Great course. Well
                                                structured, paced and I feel
                                                far more confident using
                                                this software now then I did
                                                back in school when I was
                                                learning. And the guy doing
                                                the voice over really is
                                                great at what he does
                                            </p>
                                        </div>
                                    </div>

                                    <div class="course-review">
                                        <div class="profile-img">
                                            <img src="assets/images/blog/author.jpg" alt="" class="img-fluid" />
                                        </div>
                                        <div class="review-text">
                                            <h5>
                                                Rasedh raj
                                                <span>1 Year Ago</span>
                                            </h5>
                                            <div class="rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star-half"></i></a>
                                            </div>
                                            <p>
                                                Very deep course for a
                                                beginner, enjoyed everything
                                                from the very start and
                                                every detail is vastly
                                                investigated and discussed.
                                                A nice choice for those, who
                                                are enrolling Python.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="course-sidebar">


                        <div class="course-widget course-details-info">
                            <h4 class="course-title">Your information</h4>
                            <ul>
                                <li>
                                    <div>
                                        <span><i class="far fa-user"></i>Full name :</span>

                                        <a href="#"
                                            class="d-inline-block text-capitalize">{{ $student->first_name }}
                                            {{ $student->last_name }}</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="text-capitalize">
                                        <span><i class="fa fa-sliders-h"></i>Class :
                                        </span>
                                        {{ $student->class }}
                                    </div>
                                </li>


                                <li>
                                    <div>
                                        <span><i class="far fa-file-alt"></i>Courses :</span>
                                        {{ $nbcourses }}
                                    </div>
                                </li>

                            </ul>
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
                @foreach ($coursesCategories as $course)
                    <div class="col-lg-4 col-md-6">
                        <div class="course-block">
                            <div class="course-img">
                                <img src="assets/images/course/course1.jpg" alt="" class="img-fluid">
                                <span class="course-label">{{ $course->level }}</span>
                            </div><br />

                            <div class="course-content">
                                <div class="course-price ">
                                    @if ($course->regular_price && !$course->sale_price)
                                        <span class="text-sm font-medium text-gray-900"><span class="uppercase"> $
                                                {{ $course->regular_price }}</span></span>
                                    @endif
                                    @if ($course->regular_price && $course->sale_price)
                                        <span class="text-sm font-medium text-gray-900"><span
                                                class="line-through pr-2 text-gray-500" style="font-size:35px;">
                                                ${{ $course->sale_price }}</span><spa class="del">${{ $course->regular_price }}</spa></span>
                                    @endif
                                    @if (!$course->regular_price && !$course->sale_price)
                                        <span class="uppercase">Free</span>
                                    @endif
                                </div>

                                <h4><a href="">{{ $course->title }}</a></h4>
                                <div class="rating">

                                    @if ($course->rating == 1)
                                        <!-- Render HTML for a review with a rating of 1 -->
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <span>{{ $course->rating }}.00</span>
                                    @elseif($course->rating == 2)
                                        <!-- Render HTML for a review with a rating of 2 -->
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <span>{{ $course->rating }}.00</span>
                                    @elseif($course->rating == 3)
                                        <!-- Render HTML for a review with a rating of 3 -->
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <span>{{ $course->rating }}.00</span>
                                    @elseif($course->rating == 4)
                                        <!-- Render HTML for a review with a rating of 4 -->
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <span>{{ $course->rating }}.00</span>
                                    @elseif($course->rating == 5)
                                        <!-- Render HTML for a review with a rating of 5 -->
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <span>{{ $course->rating }}.00</span>
                                    @else
                                        <!-- Render HTML for undefined or null rating -->
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <span>{{ $course->rating }}.00</span>
                                    @endif

                                </div>
                                <p>{{ $course->description }}</p>

                                <div class="course-footer d-lg-flex align-items-center justify-content-between">
                                    <div class="course-meta">
                                        <span class="course-student"><i
                                                class="bi bi-group"></i>{{ $course->fake_students_enrolled }}</span>
                                        <span class="course-duration"><i
                                                class="bi bi-badge3"></i>{{ $course->nblessonsbycourses }} Lessons</span>
                                    </div>

                                    <div class="buy-btn">
                                        <a href="{{ route('course_detail', $course->id) }}"
                                            class="btn btn-main-2 btn-small">Details</a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (count($coursesCategories) == 0)
                    Explore beyond! While there are currently no related courses available, this presents an opportunity to
                    discover new topics and broaden your horizons. Stay curious, and let your learning journey lead you to
                    exciting new opportunities!
                @endif
            </div>
        </div>
    </section>
    <div class="fixed-btm-top">
        <a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
    </div>
    <script>
        const home = document.getElementById('nav-home-tab')
        const homeContent = document.getElementById('nav-home')

        const topics = document.getElementById('nav-topics-tab')
        const topicsContent = document.getElementById('nav-topics')

        const instructor = document.getElementById('nav-instructor-tab')
        const instructorContent = document.getElementById('nav-instructor')

        const feedback = document.getElementById('nav-feedback-tab')
        const feedbackContent = document.getElementById('nav-feedback')

        hiddenShow(instructor, homeContent, instructorContent, topicsContent)
        hiddenShow(feedback, homeContent, feedbackContent, instructorContent, topicsContent)

        hiddenShow(home, topicsContent, homeContent, instructorContent)
        hiddenShow(topics, homeContent, topicsContent, instructorContent)

        function hiddenShow(div, divContent, divR1, divR2) {
            div.addEventListener('click', function() {
                divR1.style.display = 'flex';
                divContent.style.display = 'none';
                divR2.style.display = 'none';
                divR3.style.display = 'none';
            })
        }
    </script>
@endsection
