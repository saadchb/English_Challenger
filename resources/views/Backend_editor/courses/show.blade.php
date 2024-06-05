@extends('Backend_editor.Layout')
@section('title', 'Detail Courses')
@section('content')
    <html>

    <head>
        <title>Edutim- Education LMS template</title>

        <!-- Mobile Specific Meta-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- bootstrap.min css -->
        <link rel="stylesheet" href="{{ asset('storage/assets/vendors/bootstrap/bootstrap.css') }}">
        <!-- Iconfont Css -->
        <link rel="stylesheet" href="{{ asset('storage/assets/vendors/fontawesome/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/vendors/bicon/css/bicon.min.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/vendors/themify/themify-icons.css') }}">
        <!-- animate.css -->
        <link rel="stylesheet" href="{{ asset('storage/assets/vendors/animate-css/animate.css') }}">
        <!-- WooCOmmerce CSS -->
        <link rel="stylesheet" href="{{ asset('storage/assets/vendors/woocommerce/woocommerce-layouts.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/vendors/woocommerce/woocommerce-small-screen.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/vendors/woocommerce/woocommerce.css') }}">
        <!-- Owl Carousel  CSS -->
        <link rel="stylesheet" href="{{ asset('storage/assets/vendors/owl/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/vendors/owl/assets/owl.theme.default.min.css') }}">

        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="{{ asset('storage/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/css/responsive.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
        <script src="https://cdn.tailwindcss.com/3.3.0"></script>
        <script>
            tailwind.config = {
                darkMode: "class",
                theme: {
                    fontFamily: {
                        sans: ["Roboto", "sans-serif"],
                        body: ["Roboto", "sans-serif"],
                        mono: ["ui-monospace", "monospace"],
                    },
                },
                corePlugins: {
                    preflight: false,
                },
            };
        </script>
    </head>

    <body id="top-header">

        <div class="fixed top-0 right-0  z-40 bg-white flex items-center justify-between px-6 py-4 border-b w-full"
            style="width: 81%;">
            <div class="flex items-center">
                <h2 class="text-xl font-bold text-gray-900"> your course</h2>
            </div>
            <div class="flex items-center gap-x-3">
                <a class="relative ring-1 ring-black ring-opacity-5 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm px-4 py-2 flex items-center gap-x-1 rounded-md font-medium"
                    href="{{ route('Courses.index') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                    </svg>Back</a>

                <div class="flex items-center">
                    <div class="relative flex items-center" data-headlessui-state="">
                        <button
                            class="flex items-center overflow-hidden rounded-full flex-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            id="headlessui-popover-button-:r0:" type="button" aria-expanded="false"
                            data-headlessui-state="">
                            <img class="w-8 h-8 object-cover object-center"
                                src="https://secure.gravatar.com/avatar/c1eff7d415e82d3b5f33a694b91a4a74?s=96&amp;d=mm&amp;r=g"
                                alt="instructor">
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!--search overlay start-->
        <div class="search-wrap">
            <div class="overlay">
                <form action="" class="search-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-9">
                                <h3>Search Your keyword</h3>
                                <input type="text" class="form-control" placeholder="Search..." />
                            </div>
                            <div class="col-md-2 col-3 text-right">
                                <div class="search_toggle toggle-wrap d-inline-block">
                                    <img class="search-close" src="assets/images/close.png"
                                        srcset="assets/images/close@2x.png 2x" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--search overlay end-->
        <section class="page-header">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="page-header-content">
                            <h1>Course Single</h1>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="page-wrapper edutim-course-single">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="course-single-header">
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <span>(5.00)</span>
                            </div>

                            <h3 class="single-course-title">{{ $course->title }}</h3>


                            <div class="single-course-meta ">
                                <ul>
                                    <li>
                                        <span><i class="fa fa-calendar"></i>Last Update :</span>
                                        <p class="d-inline-block">{{ $course->updated_at }}</p>
                                    </li>

                                    <li>
                                        <span><i class="fa fa-bookmark"></i>Category :</span>
                                        <p class="d-inline-block">
                                            @foreach ($categories as $index => $categorie)
                                                {{ $categorie->title }}@if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="single-course-details ">
                            <h4 class="course-title">Description</h4>
                            <p>{{ $course->description }}</p>

                        </div>

                        <div id="accordionExample" class="mb-3">
                            <div class="edutim-course-topics-header d-lg-flex justify-content-between">
                                <div class="edutim-course-topics-header-left">
                                    <h4 class="course-title">Curriculum</h4>
                                </div>

                            </div>
                            @foreach ($curricula as $curriculum)
                                <div
                                    class="rounded-b-lg border border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-body-dark">
                                    <h2 class="accordion-header mb-0" id="{{ $curriculum->title }}">
                                        <button
                                            class="data-[twe-collapse-collapsed] group relative flex w-full items-center border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none data-[twe-collapse-collapsed]:rounded-b-lg dark:bg-body-dark dark:text-white [&:not([data-twe-collapse-collapsed])]:bg-white [&:not([data-twe-collapse-collapsed])]:text-primary [&:not([data-twe-collapse-collapsed])]:shadow-border-b dark:[&:not([data-twe-collapse-collapsed])]:bg-surface-dark dark:[&:not([data-twe-collapse-collapsed])]:text-primary  dark:[&:not([data-twe-collapse-collapsed])]:shadow-white/10"
                                            type="button" data-twe-collapse-init data-twe-collapse-collapsed
                                            data-twe-target="#collapse{{ $curriculum->title }}" aria-expanded="false"
                                            aria-controls="collapse{{ $curriculum->title }}">
                                            <h4>{{ $curriculum->title }}</h4>
                                            <span
                                                class="-me-1 ms-auto h-5 w-5 shrink-0 rotate-[-180deg] transition-transform duration-200 ease-in-out group-data-[twe-collapse-collapsed]:me-0 group-data-[twe-collapse-collapsed]:rotate-0 motion-reduce:transition-none [&>svg]:h-6 [&>svg]:w-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $curriculum->title }}" class="!visible hidden"
                                        data-twe-collapse-item aria-labelledby="{{ $curriculum->title }}"
                                        data-twe-parent="#accordionExample">
                                        <div class="px-5 py-4">
                                            <strong>Lessons : </strong><br />
                                            <ul>
                                                @foreach ($lessons as $lesson)
                                                    @if ($lesson->curriculum_id == $curriculum->id)
                                                        <li class="ml-6"> {{ $lesson->title }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            <strong>Quizzes : </strong><br />
                                            <ul>
                                                @foreach ($quizzes as $quizze)
                                                    @if ($quizze->curriculum_id == $curriculum->id)
                                                        <li class="ml-6"> {{ $quizze->title }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


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
                                    <p>I'm a developer with a passion for teaching. I'm the lead instructor at the London
                                        App Brewery, London's leading Programming Bootcamp. I've helped hundreds of
                                        thousands of students learn to code and change their lives by becoming a developer
                                    </p>
                                    <div class="instructor-courses">
                                        <span><i class="bi bi-folder"></i>4 Courses</span>
                                        <span><i class="bi bi-group"></i>400 Students</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="course-sidebar">
                            <div class="course-single-thumb">
                                <img src="{{ asset('storage/' . $course->img) }}" alt=""
                                    style="height:300px; width:300px;" class="img-flui ">
                                <div class="course-price-wrapper">
                                    <div class="course-price ml-3">
                                        <h4>Price: <span><span class="text-sm font-medium text-gray-900">
                                                    @if ($course->regular_price && !$course->sale_price)
                                                        <span class="text-sm font-medium text-gray-900"><span
                                                                class="uppercase"> $
                                                                {{ $course->regular_price }}</span></span>
                                                    @endif
                                                    @if ($course->regular_price && $course->sale_price)
                                                        <span class="text-sm font-medium text-gray-900"><span
                                                                class="line-through pr-2 text-gray-500"
                                                                style="font-size:35px;">
                                                                ${{ $course->sale_price }}</span><span>${{ $course->regular_price }}</span></span>
                                                    @endif
                                                    @if (!$course->regular_price && !$course->sale_price)
                                                        <span class="uppercase">Free</span>
                                                    @endif
                                                </span></span></h4>
                                    </div>
                                    <div class="buy-btn"><a href="{{route('buyCourse',$course->id)}}" class="btn btn-primary btn-block">Buy This
                                            Course</a></div>
                                </div>
                            </div>


                            <div class="course-widget single-info">
                                <i class="bi bi-group"></i>
                                Enrolled <span>101 Students</span>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Main jQuery -->
        <script src="{{ asset('storage/assets/vendors/jquery/jquery.js') }}"></script>
        <!-- Bootstrap 4.5 -->
        <script src="{{ asset('storage/assets/vendors/bootstrap/bootstrap.js') }}"></script>
        <!-- Counterup -->
        <script src="{{ asset('storage/assets/vendors/counterup/waypoint.js') }}"></script>
        <script src="{{ asset('storage/assets/vendors/counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('storage/assets/vendors/jquery.isotope.js') }}"></script>
        <script src="{{ asset('storage/assets/vendors/imagesloaded.js') }}"></script>
        <!--  Owlk Carousel-->
        <script src="{{ asset('storage/assets/vendors/owl/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/script.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    </body>

    </html>
@endsection
