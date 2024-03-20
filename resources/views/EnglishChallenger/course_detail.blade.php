@extends('layouts.app')
@section('title','detail course')
@section('content')

<section class="page-wrapper edutim-course-single course-single-style-3">
    <div class="course-single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course-single-header white-text">
                        <span class="subheading">Backend,Development</span>
                        <h3 class="single-course-title">Information About UI/UX Design Degree</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                        <div class="d-flex align-items-center ">
                            <div class="single-top-meta">
                                <i class="fa fa-user"></i><span> 3450 Students Enrolled</span>
                            </div>
                            <div class="single-top-meta">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <span>5.00 (500 ratings)</span>
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
                        <a class="nav-item nav-link" id="nav-topics-tab" data-toggle="tab" href="#nav-topics" role="tab" aria-controls="nav-profile" aria-selected="false">Topics</a>
                        <a class="nav-item nav-link" id="nav-instructor-tab" data-toggle="tab" href="#nav-instructor" role="tab" aria-controls="nav-contact" aria-selected="false">Instructor</a>
                        <a class="nav-item nav-link" id="nav-feedback-tab" data-toggle="tab" href="#nav-feedback" role="tab" aria-controls="nav-contact" aria-selected="false">Feedback</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="single-course-details ">
                            <h4 class="course-title">Description</h4>
                            <p>Knowing PHP has allowed me to make enough money to stay home and make courses like this one for students all over the world. Being a PHP developer can allow anyone to make really good money online and offline, developing dynamic applications.
                                Knowing PHP will allow you to build web applications, websites or Content Management systems, like WordPress, Facebook, Twitter or even Google.
                                There is no limit to what you can do with this knowledge. PHP is one of the most important web programming languages to learn, and knowing it, will give you SUPER POWERS in the web</p>


                            <div class="course-widget course-info">
                                <h4 class="course-title">What You will Learn?</h4>
                                <ul>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Clean up face imperfections, improve and repair photos
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Remove people or objects from photos
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Master selections, layers, and working with the layers panel
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Use creative effects to design stunning text styles
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        working with the layers panel
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Cut away a person from their background
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-topics" role="tabpanel" aria-labelledby="nav-topics-tab">
                        <!--  Course Topics -->
                        <div class="edutim-single-course-segment  edutim-course-topics-wrap">
                            <div class="edutim-course-topics-header d-lg-flex justify-content-between">
                                <div class="edutim-course-topics-header-left">
                                    <h4 class="course-title">Topics for this course</h4>
                                </div>
                                <div class="edutim-course-topics-header-right">
                                    <span> Total learning: <strong>14 Lessons</strong></span>
                                    <span> Time: <strong>13h 20m 20s</strong> </span>
                                </div>
                            </div>

                            <div class="edutim-course-topics-contents">
                                <div class="edutim-course-topic ">
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button class="btn-block text-left curriculmn-title-btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <h4 class="curriculmn-title">Introduction & Get Started</h4>
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="course-lessons">
                                                    <div class="single-course-lesson">
                                                        <div class="course-topic-lesson">
                                                            <i class="fab fa-youtube"></i>
                                                            <span> Work with Smart Objects</span>
                                                        </div>
                                                        <div class="course-lesson-duration">
                                                            00:05:20
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h2 class="mb-0">
                                                    <button class="btn-block text-left collapsed curriculmn-title-btn" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        <h4 class="curriculmn-title"> Artboards & Raster Layers</h4>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="course-lessons">
                                                    <div class="single-course-lesson">
                                                        <div class="course-topic-lesson">
                                                            <i class="fab fa-youtube"></i>
                                                            <span>Use Photoshop’s Interface Efficiently</span>
                                                        </div>
                                                        <div class="course-lesson-duration">
                                                            00:05:20
                                                        </div>
                                                    </div>
                                                    <div class="single-course-lesson">
                                                        <div class="course-topic-lesson">
                                                            <i class="fab fa-youtube"></i>
                                                            <span>Use the Eye Dropper & Swatches</span>
                                                        </div>
                                                        <div class="course-lesson-duration">
                                                            00:05:20
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h2 class="mb-0">
                                                    <button class="btn-block text-left collapsed curriculmn-title-btn" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        <h4 class="curriculmn-title">Work with Smart Objects</h4>
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                <div class="course-lessons">
                                                    <div class="single-course-lesson">
                                                        <div class="course-topic-lesson">
                                                            <i class="fab fa-youtube"></i>
                                                            <span>Smart Objects Explained</span>
                                                        </div>
                                                        <div class="course-lesson-duration">
                                                            00:05:20
                                                        </div>
                                                    </div>
                                                    <div class="single-course-lesson">
                                                        <div class="course-topic-lesson">
                                                            <i class="fab fa-youtube"></i>
                                                            <span>Filters with Smart Objects</span>
                                                        </div>
                                                        <div class="course-lesson-duration">
                                                            00:05:20
                                                        </div>
                                                    </div>

                                                    <div class="single-course-lesson">
                                                        <div class="course-topic-lesson">
                                                            <i class="fab fa-youtube"></i>
                                                            <span>Clean Up Face Imperfections</span>
                                                        </div>
                                                        <div class="course-lesson-duration">
                                                            00:05:20
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                    <p>I'm a developer with a passion for teaching. I'm the lead instructor at the London App Brewery, London's leading Programming Bootcamp. I've helped hundreds of thousands of students learn to code and change their lives by becoming a developer </p>
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
                                        <p>Great course. Well structured, paced and I feel far more confident using this software now then I did back in school when I was learning. And the guy doing the voice over really is great at what he does</p>
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
                                        <p>Very deep course for a beginner, enjoyed everything from the very start and every detail is vastly investigated and discussed. A nice choice for those, who are enrolling Python. </p>
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
                        <img src="assets/images/course/course2.jpg" alt="" class="img-fluid w-100">

                        <div class="course-price-wrapper">
                            <div class="course-price">
                                <h4>Price: <span>$150</span> <del class="text-muted">$200</del></h4>
                            </div>
                            <p class="text-info"><i class="fa fa-clock mr-2"></i>Only 2 days left at this price</p>
                            <div class="buy-btn"><a href="#" class="btn btn-main btn-block">Buy This Course</a></div>
                        </div>
                    </div>

                    <div class="course-widget course-details-info">
                        <h4 class="course-title">This Course Includes</h4>
                        <ul>
                            <li>
                                <div class="">
                                    <span><i class="bi bi-graph-bar"></i>Skill level : </span>
                                    Beginner
                                </div>
                            </li>
                            <li>
                                <div class="">
                                    <span><i class="bi bi-user-ID"></i>Instructor :</span>
                                    <a href="#" class="d-inline-block">Jone Smit</a>
                                </div>
                            </li>

                            <li>
                                <div class="">
                                    <span><i class="bi bi-flag"></i>Duration :</span>
                                    2 weeks
                                </div>
                            </li>
                            <li>
                                <div class="">
                                    <span><i class="bi bi-paper"></i>Lessons :</span>
                                    42
                                </div>
                            </li>
                            <li>
                                <div class="">
                                    <span><i class="bi bi-forward"></i>Language :</span>
                                    English
                                </div>
                            </li>

                            <li>
                                <div class="">
                                    <span><i class="bi bi-madel"></i>Certificate :</span>
                                    yes
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="course-widget course-share d-flex justify-content-between align-items-center">
                        <span>Share</span>
                        <ul class="social-share list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        </ul>
                    </div>

                    <div class="course-widget">
                        <h4 class="course-title">Tags</h4>
                        <div class="single-course-tags">
                            <a href="#">Web Deisgn</a>
                            <a href="#">Development</a>
                            <a href="#">Html</a>
                            <a href="#">css</a>
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
            <div class="col-lg-4 col-md-6">
                <div class="course-block">
                    <div class="course-img">
                        <img src="assets/images/course/course1.jpg" alt="" class="img-fluid">
                        <span class="course-label">Beginner</span>
                    </div>

                    <div class="course-content">
                        <div class="course-price ">$50</div>

                        <h4><a href="#">Information About UI/UX Design Degree</a></h4>
                        <div class="rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <span>(5.00)</span>
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>

                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span>
                            </div>

                            <div class="buy-btn"><a href="#" class="btn btn-main-2 btn-small">Details</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="course-block">
                    <div class="course-img">
                        <img src="assets/images/course/course2.jpg" alt="" class="img-fluid">
                        <span class="course-label">Advanced</span>
                    </div>

                    <div class="course-content">
                        <div class="course-price ">$80 <span class="del">$120</span></div>

                        <h4><a href="#">Photography Crash Course for Photographer</a></h4>
                        <div class="rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <span>(5.00)</span>
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>

                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span>
                            </div>

                            <div class="buy-btn"><a href="#" class="btn btn-main-2 btn-small">Details</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="course-block">
                    <div class="course-img">
                        <img src="assets/images/course/course3.jpg" alt="" class="img-fluid">
                        <span class="course-label">Expert</span>
                    </div>

                    <div class="course-content">
                        <div class="course-price ">$100 <span class="del">$180</span></div>

                        <h4><a href="#">React – The Complete Guide (React Router)</a></h4>
                        <div class="rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <span>(5.00)</span>
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>

                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span>
                            </div>

                            <div class="buy-btn"><a href="#" class="btn btn-main-2 btn-small">Details</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection