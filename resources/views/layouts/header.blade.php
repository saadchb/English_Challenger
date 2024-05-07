<?php

use App\Models\Course;

$courses = Course::all();
$count = 0;
?>
<div class="header-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <ul class="header-contact">
                    <li>
                        <span>Call :</span>
                        <a href="whatsapp://send?phone=+212687119547" target="_blank">(+212)687119547</a>

                    </li>
                    <li>
                        <span>Email :</span>
                        contact@englishchallenger.com
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="header-right float-right">
                    <div class="header-socials">
                        <ul>
                            <li class="icons" style="width: 40px;"><a href="#"><i class="fab fa-facebook-f icons1"></i></a></li>
                            <li class="icons" style="width: 40px;"><a href="#"><i class="fab fa-twitter icons1"></i></a></li>
                            <li class="icons" style="width: 40px; "><a href="#"><i class="fab fa-linkedin icons1"></i></a></li>
                        </ul>
                    </div>
                    <div class="header-btn ">
                        <a href="/Account" class="btn btn-main btn-small div1" style="border-radius:15px ;"><i class="fa fa-user mr-2 "></i>Login /
                            Register</a>
                    </div>
                    <div class="header-btn ">
                        <a href="/dachboard" class="btn btn-main btn-small div1 " style="border-radius:15px ;"><i class="fa fa-user mr-2 "></i>Admin </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Menu Start -->

<div class="site-navigation main_menu " id="mainmenu-area">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('build/assets/images/English_Logo.png') }}" alt="logo3" width="160px">

            </a>
            <button class="navbar-toggler navbar-toggle header-search search_toggle" style="font-size: larger; margin-left:190px !important;" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-search text-dark"></i>
            </button>
            <!-- <a href="#" class="navbar-toggle header-search search_toggle"  style="font-size: larger; margin-left:150px !important;"> <i class="fa fa fa-search text-dark "></i></a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item ">
                        <a href="/Schools_list" class="nav-link">
                            Schools
                        </a>
                    </li>

                    <li class="nav-item dropdown dropdown-centered">
                        <a class="nav-link dropdown-toggle" href="/course_list" id="navbar4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Courses<i class="fa fa-angle-down"></i>
                        </a>
                        <div id="cart" class="dropdown-menu p-2" style="color:#646a76;" aria-labelledby="navbar3">
                            <ul class="list-unstyled d-flex">
                                <li id="li3" style="width: 18rem; color:#646a76; margin-bottom: 10px;">
                                    <div class="card-body">
                                        <h5 class="card-title">Browse courses</h5>
                                        <p class="card-text">
                                            At English Challenger we provide a range of accredited teacher training
                                            courses.
                                            If you’re new to teaching, we’d recommend starting with our TESOL course,
                                            and then pursuing your certifications after.
                                        </p>
                                        <p class="card-link card-subtitle mb-2 text-muted disabled">More info:
                                            <a href="/course_list" class="card-link" style="text-decoration: underline;"><strong>See Courses <i class="fa fa-angle-right"></i></strong></a>
                                        </p>
                                    </div>
                                </li>
                                @foreach ($courses as $course)
                                @if ($count < 3) <li style="width: 16rem; color:#646a76; margin: 5px;">
                                    <div id="cart" class="card-body">
                                        <img src="{{ asset('storage/' . $course->img) }}" style=" width: 300px; ;height: 200px;" alt="" class="img-fluid">
                                        <h5 class="card-title">{{ $course->title }}</h5>
                                        <p style="max-height: 3em; overflow: hidden;" class="card-text">{{ $course->description }}</p>
                                        <a href="{{route('course_detail', $course->id)}}" style="text-decoration: underline;"><strong>course detail</strong> <i class="fa fa-angle-right"></i></a>

                                    </div>
                    </li>
                    @php $count++; @endphp
                    @else
                    @break
                    @endif
                    @endforeach

                </ul>
            </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/page-certifcate" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Certificates<i class="fa fa-angle-down"></i>
                </a>

                <div class="dropdown-menu p-2" style="color:#646a76;" aria-labelledby="navbar3">
                    <ul class="list-unstyled d-flex">
                        <li id="li3" style="width: 18rem; color: #646a76; margin-bottom: 10px;">
                            <div class="card-body">
                                <h5 class="card-title">CERTIFCATE OF TESOL/TEFL</h5>
                                <p class="card-text">
                                    At English Challenger we provide a range of accredited teacher quizzes.
                                    If you want to know your level , we’d recommend starting this quizzes ,
                                    and then pursuing your certifications after.
                                </p>
                                <a href="#" class="card-link card-subtitle mb-2 text-muted disabled">More info:</a>
                                <a href="https://www.worldtesolacademy.com/" class="card-link">About
                                    TESOL/TEFOL</a>
                            </div>
                        </li>
                        <li>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('build/assets/images/course/tesol.png') }}" alt="course 1">
                                <div class="card-body">
                                    <h5 class="card-title">TESOL </h5>
                                    <p class="card-text">Explore your level as an English language teacher.</p>
                                    <a href="/page-certifcate" style="text-decoration: underline;">
                                        <strong>more detail</strong> <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item dropdown  dropdown-centered">
                <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Quizzes<i class="fa fa-angle-down"></i>
                </a>

                <div class="dropdown-menu  p-2" style="color:#646a76;" aria-labelledby="navbar3">
                    <ul class="list-unstyled d-flex">
                        <li id="li3" style="width: 18rem; color: #646a76; margin-bottom: 10px;">
                            <div class="card-body">
                                <h5 class="card-title"> Interactive Quizzes for Continuous Learning</h5>
                                <p class="card-text">
                                    Explore a diverse range of quizzes tailored for learners of all ages.
                                    Experience dynamic assessments with real-time leaderboards and self-assessment practice for comprehensive learning.
                                </p>

                            </div>
                        </li>
                        <li>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('build/assets/images/course/QUIZ_IMG.jpeg') }}" alt="course 1">
                                <div class="card-body">
                                    <h5 class="card-title">Quizze </h5>
                                    <p class="card-text">Explore your level as an English language student.</p>
                                    <a href="/First-test" style="text-decoration: underline;">
                                        <strong>Take The Quizze</strong> <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Teachers
                    <i class="fa fa-angle-down"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbar3">
                    <a class="dropdown-item " href="{{route('Become_teacher')}}">
                        Become a teacher
                    </a>
                    <!-- <a class="dropdown-item " href="#">
                    login
                </a> -->

                </div>
            </li>
            <li class="nav-item ">
                <a href="{{route('detailsStudents.show')}}" class="nav-link">
                    Students
                </a>
            </li>
            </ul>

            <ul class="header-contact-right d-none d-lg-block">

               
                <li><a href="#" class="header-search search_toggle"> <i class="fa  fa-search"></i></a>
                </li>
            </ul>

        </div> <!-- / .navbar-collapse -->
</div> <!-- / .container -->
</nav>
</div>