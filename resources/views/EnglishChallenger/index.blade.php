@extends('layouts.app')
@section('title','Home')
@section('content')

<section class="banner" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
                <div class="banner-content center-heading">
                    <span class="subheading">Expert instruction</span>
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
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-badge2"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Learn from Industry Experts</h4>
                        <p>Behind the word mountains, far from the countries Vokalia </p>
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-article"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Learn the Latest Top Skills</h4>
                        <p>Behind the word mountains, far from the countries Vokalia </p>
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Lifetime Access & Support</h4>
                        <p>Behind the word mountains, far from the countries Vokalia </p>
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
    <section class="section-padding video-section" >
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
       <section class="section-padding course-grid" >
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7">
                    <div class="section-heading center-heading">
                        <span class="subheading">Top Trending Courses</span>
                        <h3>Over 200+ New Online Courses</h3>
                    </div>
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
                <div class="course-item cat1 cat3 col-lg-4 col-md-6">
                    <div class="course-block">
                        <div class="course-img">
                            <img src="build/assets/images/course/course3.jpg" alt="" class="img-fluid">
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

                <div class="course-item cat2 cat4 col-lg-4 col-md-6">
                    <div class="course-block">
                        <div class="course-img">
                            <img src="build/assets/images/course/course2.jpg" alt="" class="img-fluid">
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
                
                <div class="course-item cat5 cat2 col-lg-4 col-md-6">
                    <div class="course-block">
                        <div class="course-img">
                            <img src="build/assets/images/course/course1.jpg" alt="" class="img-fluid">
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
            </div>
        </div>
        <!--course-->
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
                <div class="course-btn text-lg-right"><a href="#" class="btn btn-main"><i class="fa fa-store mr-2"></i>All Courses</a></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="course-block">
                    <div class="course-img">
                        <img src="build/assets/images/course/course1.jpg" alt="" class="img-fluid">
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
                        <img src="build/assets/images/course/course2.jpg" alt="" class="img-fluid">
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
                        <img src="build/assets/images/course/course3.jpg" alt="" class="img-fluid">
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
                                <span class="counter h2">1450</span>
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
<section class="section-padding bg-grey team-2">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading">
                    <span class="subheading">Best Expert Trainer</span>
                    <h3>Our Professional trainer</h3>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="team-block">
                    <div class="team-img">
                        <img src="build/assets/images/team/team-4.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="team-info">
                        <h4>Harish Ham</h4>
                        <p>CEO, Developer</p>
                    </div>
                    <ul class="team-socials list-inline">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="team-block">
                    <div class="team-img">
                        <img src="build/assets/images/team/team-1.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="team-info">
                        <h4>Tanvir Hasan</h4>
                        <p>Market Researcher</p>
                    </div>
                    <ul class="team-socials list-inline">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="team-block">
                    <div class="team-img">
                        <img src="build/assets/images/team/team-2.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="team-info">
                        <h4>Mikele John</h4>
                        <p>Content Writter</p>
                    </div>
                    <ul class="team-socials list-inline">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
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
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eius autem aliquid pariatur rerum. Deserunt, praesentium.
                             Adipisci, voluptates nihil debitis</p>
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
                                <img src="build/assets/images/clients/test-1.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>John Doe</h4>
                                <span class="designation">Developer</span>
                            </div>
                        </div>
                    </div>

                     <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eius autem aliquid pariatur rerum. Deserunt, praesentium.
                             Adipisci, voluptates nihil debitis</p>
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
                                <img src="build/assets/images/clients/test-2.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>John Doe</h4>
                                <span class="designation">Developer</span>
                            </div>
                        </div>
                    </div>


                    <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eius autem aliquid pariatur rerum. Deserunt, praesentium.
                             Adipisci, voluptates nihil debitis</p>
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
                                <img src="build/assets/images/clients/test-3.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>John Doe</h4>
                                <span class="designation">Developer</span>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding offer-course">
    <div class="container">
        <div class="row ">
            <div class="col-lg-4">
                <div class="section-heading">
                    <span class="subheading">50% Discount offer</span>
                    <h3>Hurry Up to get <span>50% off</span> courses</h3>
                    <p>Eum eligendi nihil labore nemo alias eos sapiente perferendis iste molestias explicabo.tempor incididunt ut labore et dolore magna aliqua tempor incididunt.  </p>
                    <a href="#" class="btn btn-main"><i class="fa fa-store mr-2"></i>All Courses</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="course-block">
                    <div class="course-img">
                        <img src="build/assets/images/course/course1.jpg" alt="" class="img-fluid">
                        <span class="course-label">Beginner</span>
                    </div>
                    
                    <div class="course-content">
                        <div class="rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <span>(5.00)</span>
                        </div>
                        <h4><a href="#">Information About UI/UX Design Degree</a></h4>    
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>
                        <div class="course-price ">$50</div>   
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="course-block">
                    <div class="course-img">
                        <img src="build/assets/images/course/course2.jpg" alt="" class="img-fluid">
                        <span class="course-label">Advanced</span>
                    </div>
                    
                    <div class="course-content">
                        <div class="rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <span>(5.00)</span>
                        </div>
                        <h4><a href="#">Photography Crash Course for Photographer</a></h4>    
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>
                        <div class="course-price ">$80 <span class="del">$120</span></div>   
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>

       
        <div class="row">               
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <img src="build/assets/images/blog/news-1.jpg" alt="" class="img-fluid">
                    <div class="blog-content">
                        <div class="entry-meta">
                            <span><i class="fa fa-calendar-alt"></i>May 19, 2020</span>
                            <span><i class="fa fa-comments"></i>1 comment</span>
                        </div>
    
                        <h2><a href="#">Powerful tips to grow business manner</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        <a href="#" class="btn btn-main btn-small"><i class="fa fa-plus-circle mr-2"></i>Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <img src="build/assets/images/blog/news-2.jpg" alt="" class="img-fluid">
                    <div class="blog-content">
                        <div class="entry-meta">
                            <span><i class="fa fa-calendar-alt"></i>May 19, 2020</span>
                            <span><i class="fa fa-comments"></i>1 comment</span>
                        </div>
    
                        <h2><a href="#">Powerful tips to grow effective manner</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        <a href="#" class="btn btn-main btn-small"><i class="fa fa-plus-circle mr-2"></i>Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <img src="build/assets/images/blog/news-3.jpg" alt="" class="img-fluid">
                    <div class="blog-content">
                        <div class="entry-meta">
                            <span><i class="fa fa-calendar-alt"></i>May 19, 2020</span>
                            <span><i class="fa fa-comments"></i>1 comment</span>
                        </div>
    
                        <h2><a href="#">Python may be you completed online </a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
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
                        <p>Behind the word mountains, far from the countries</p>
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
                        <p>Behind the word mountains, far from the countries </p>
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
                        <p>Behind the word mountains, far from the countries</p>
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
                        <p>Behind the word mountains, far from the countries</p>
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
