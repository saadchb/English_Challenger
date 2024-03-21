@extends('layouts.app')
@section('title', 'detail course')
@section('content')
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
                                    <div class="rating">
                                        @if (!empty($review->rating))
                                            @if ($review->rating == 1)
                                                <!-- Render HTML for a review with a rating of 1 -->
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                                <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                                <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                                <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                            @elseif($review->rating == 2)
                                                <!-- Render HTML for a review with a rating of 2 -->
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                                <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                                <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                            @elseif($review->rating == 3)
                                                <!-- Render HTML for a review with a rating of 3 -->
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                                <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                            @elseif($review->rating == 4)
                                                <!-- Render HTML for a review with a rating of 4 -->
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                            @elseif($review->rating == 5)
                                                <!-- Render HTML for a review with a rating of 5 -->
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            @endif
                                            <span>{{ $review->rating }}.00</span>
                                        @else
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                        <a href="#"><i class="fa fa-star text-secondary"></i></a>
                                            <span>0.00</span>
                                        @endif

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
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                role="tab" aria-controls="nav-home" aria-selected="true">Overview</a>
                            <a class="nav-item nav-link" id="nav-topics-tab" data-toggle="tab" href="#nav-topics"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Curriculum</a>
                            <a class="nav-item nav-link" id="nav-instructor-tab" data-toggle="tab" href="#nav-instructor"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Instructor</a>
                            <a class="nav-item nav-link" id="nav-feedback-tab" data-toggle="tab" href="#nav-feedback"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Feedback</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
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
                                                            <button
                                                                class="btn-block text-left collapsed curriculmn-title-btn"
                                                                type="button" data-toggle="collapse"
                                                                data-target="#collapse{{ $index }}"
                                                                aria-expanded="false"
                                                                aria-controls="collapse{{ $index }}">
                                                                <h4 class="curriculmn-title">{{ $curriculum->title }}</h4>
                                                            </button>
                                                        </h2>
                                                    </div>

                                                    <div id="collapse{{ $index }}" class="collapse"
                                                        aria-labelledby="heading{{ $index }}"
                                                        data-parent="#accordionExample">
                                                        <div class="course-lessons">
                                                            @foreach ($curriculum->lessons as $lesson)
                                                                <div class="single-course-lesson">
                                                                    <div class="course-topic-lesson">
                                                                        <span>{{ $lesson->title }}</span>
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
                        <div class="tab-pane fade" id="nav-instructor" role="tabpanel"
                            aria-labelledby="nav-instructor-tab">
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
                                <h4 class="course-title">Students Feedback</h4>

                                <div class="course-review-wrapper">
                                    <div class="course-review">
                                        <div class="profile-img">
                                            <img src="assets/images/blog/author.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="review-text">
                                            <h5>Mehedi Rasedh <span>26th june 2020</span></h5>

                                            <div class="rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star-half"></i></a>
                                            </div>
                                            <p>Great course. Well structured, paced and I feel far more confident using this
                                                software now then I did back in school when I was learning. And the guy
                                                doing the voice over really is great at what he does</p>
                                        </div>
                                    </div>


                                    <div class="course-review">
                                        <div class="profile-img">
                                            <img src="assets/images/blog/author.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="review-text">
                                            <h5>Rasedh raj <span>1 Year Ago</span></h5>
                                            <div class="rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star-half"></i></a>
                                            </div>
                                            <p>Very deep course for a beginner, enjoyed everything from the very start and
                                                every detail is vastly investigated and discussed. A nice choice for those,
                                                who are enrolling Python. </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="course-sidebar">
                        <div class="course-single-thumb">
                            <img src="{{ asset('storage/' . $course->img) }}" alt=""
                                style="height:300px; width:300px; margin-left:11px;" class="img-flui ">
                            <div class="course-price-wrapper">
                                <div class="course-price ml-3">
                                    <h4>Price: <span><span class="text-sm font-medium text-gray-900">
                                                @if ($course->regular_price && !$course->sale_price)
                                                    <span class="text-sm font-medium text-gray-900"><span
                                                            class="uppercase"> $
                                                            {{ $course->regular_price }}</span></span>
                                                @endif
                                                @if ($course->regular_price && $course->sale_price)
                                            <span class=" font-medium text-gray-900">
                                                <span class="course-price">
                                                   $ {{$course->sale_price}}
                                                </span>
                                                <span class="del"  style="font-size:35px;">
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


                        <div class="course-widget single-info">
                            <i class="bi bi-group"></i>
                            Enrolled <span>{{$course->fake_students_enrolled == null ? 0:$course->fake_students_enrolled}} Students</span>
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

                        <div class="course-widget">
                            <h4 class="course-title">Tags</h4>
                            <div class="single-course-tags">
                                @foreach ($tags as $tag)
                                    <a href="#">{{ $tag->title }}</a>
                                @endforeach
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
                                                ${{ $course->sale_price }}</span><span>${{ $course->regular_price }}</span></span>
                                    @endif
                                    @if (!$course->regular_price && !$course->sale_price)
                                        <span class="uppercase">Free</span>
                                    @endif
                                </div>

                                <h4><a href="#">{{ $course->title }}</a></h4>
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <span>(5.00)</span>
                                </div>
                                <p>{{ $course->description }}</p>

                                <div class="course-footer d-lg-flex align-items-center justify-content-between">
                                    <div class="course-meta">
                                        <span class="course-student"><i class="bi bi-group"></i>340</span>
                                        <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span>
                                    </div>

                                    <div class="buy-btn"><a href="{{ route('Courses.show', $course->id) }}"
                                            class="btn btn-primary-2 btn-small">Details</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



@endsection