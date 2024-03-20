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
                        +212000000000
                    </li>
                    <li>
                        <span>Email :</span>
                        Testing@example.com
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="header-right float-right">
                    <div class="header-socials">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="header-btn">
                        <a href="#" class="btn btn-main btn-small"><i class="fa fa-user mr-2"></i>Login / Register</a>
                    </div>
                    <div class="header-btn">
                        <a href="/dachboard" class="btn btn-main btn-small"><i class="fa fa-user mr-2"></i>Admin </a>
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
                <img src="{{ asset('build/assets/images/Logo_english.png') }}" alt="logo3" width="120px">

            </a>

            <!-- Toggler -->

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            School<i class="fa fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbar3">
                            <a class="dropdown-item " href="#">
                                Job Offers
                            </a>
                            <a class="dropdown-item " href="#">
                                Profiles
                            </a>
                        </div>
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
                                            At English Challenger we provide a range of accredited teacher training courses.
                                            If you’re new to teaching, we’d recommend starting with our TESOL course,
                                            and then pursuing your certifications after.
                                        </p>
                                        <p class="card-link card-subtitle mb-2 text-muted disabled">More info:
                                            <a href="#" class="card-link" style="text-decoration: underline;"><strong>About Us <i class="fa fa-angle-right"></i></strong></a>
                                        </p>
                                    </div>
                                </li>
                                @foreach($courses as $course)
                                @if($count < 3) <li style="width: 16rem; color:#646a76; margin: 5px;">
                                    <div id="cart" class="card-body">
                                        <img src="{{ asset('storage/'.$course->img) }}" style=" width: 300px; ;height: 200px;" alt="" class="img-fluid">
                                        <h5 class="card-title">{{$course->title}}</h5>
                                        <p class="card-text">{{$course->description}}</p>
                                        <a href="#" style="text-decoration: underline;"><strong>course detail</strong> <i class="fa fa-angle-right"></i></a>
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


            <!-- <li class="nav-item dropdown dropdown-centered">
                <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Quizzes<i class="fa fa-angle-down"></i>
                </a>
                <div class="dropdown-menu p-2" style="color:#646a76;" aria-labelledby="navbar3">
                    <ul class="list-unstyled d-flex">
                        <li id="li3" style="width: 18rem; color:#646a76; margin-bottom: 10px;">
                            <div class="card-body">
                                <h5 class="card-title">Browse quizzes</h5>
                                <p class="card-text">
                                    At English Challenger we provide a range of accredited teacher quizzes.
                                    If you want to know your level , we’d recommend starting this quizzes ,
                                    and then pursuing your certifications after.
                                </p>
                                <a href="#" class="card-link card-subtitle mb-2 text-muted disabled">More info:</a>
                                <a href="#" class="card-link">About Us</a>
                            </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="build/assets/images/course/quiz44.jpg" alt="course 1">
                    <div class="card-body">
                        <h5 class="card-title">TESOL quizze</h5>
                        <p class="card-text">Explore your level as an English language teacher.</p>
                        <a href="#" class="btn btn-danger btn-sm">qiuzze detail</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="build/assets/images/course/quiz55.jpg" alt="course 1">
                    <div class="card-body">
                        <h5 class="card-title">TEYL quizze</h5>
                        <p class="card-text">Explore your level in teaching English to young learners.</p>
                        <a href="#" class="btn btn-danger btn-sm">quizze detail</a>
                    </div>
                </div>
            </li>
            </ul>
</div>
</div>

</li> -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Quizzes<i class="fa fa-angle-down"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbar3">
        <a class="dropdown-item " href="#">
Quiz        </a>
        <a class="dropdown-item " href="#">
            Quiz
        </a>
    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Certificates<i class="fa fa-angle-down"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbar3">
        <a class="dropdown-item " href="#">
            TESOL/TEFL
        </a>
        <a class="dropdown-item " href="#">
            Cambridge Examination
        </a>
    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Consulting<i class="fa fa-angle-down"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbar3">
        <a class="dropdown-item " href="#">
            EFL Programs
        </a>
        <a class="dropdown-item " href="#">
            Extra Curricular Activities
        </a>
    </div>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Teachers<i class="fa fa-angle-down"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbar3">
        <a class="dropdown-item " href="#">
            Cvs
        </a>
        <a class="dropdown-item " href="#">
            Private Tutors
        </a>
        <a class="dropdown-item " href="#">
            Resources
        </a>
    </div>
</li>
<li class="nav-item ">
    <a href="#" class="nav-link">
        e-library
    </a>
</li>
</ul>

<ul class="header-contact-right d-none d-lg-block">
    <li> <a href="#" class="header-cart"><i class="fa fa-shopping-cart"></i></a></li>
    <li><a href="#" class="header-search search_toggle"> <i class="fa fa fa-search"></i></a></li>
</ul>

</div> <!-- / .navbar-collapse -->
</div> <!-- / .container -->
</nav>
</div>
