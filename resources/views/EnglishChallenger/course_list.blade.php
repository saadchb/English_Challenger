@extends('layouts.app')
@section('title','Course list')
@section('content')

<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="page-header-content">
            <h1><b style=" color: #FF1949;">|</b> Course List</h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="/">Home </a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
                  Courses
              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>

<section class="section-padding course">
    <div class="course-top-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <p>Showing 1-6 of 8 results</p>
                </div>

                <div class="col-lg-4">
                    <div class="topbar-search">
                        <form method="get" action="#">
                            <input type="text"  placeholder="Search our courses" class="form-control">
                            <label><i class="fa fa-search"></i></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="course-block course-style-2">
                    <div class="course-img">
                        <img src="assets/images/course/course1.jpg" alt="" class="img-fluid">
                        <span class="course-cat">WordPress</span>
                    </div>
                    
                    <div class="course-content">
                       
                        <h4><a href="#">Information About UI/UX Design Degree</a></h4>  
                         
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>
                      
                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>82</span>
                            </div> 
                           
                            <div class="course-price">$50</div> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="course-block course-style-2">
                    <div class="course-img">
                        <img src="assets/images/course/course2.jpg" alt="" class="img-fluid">
                        <span class="course-cat">Advanced</span>
                    </div>
                    
                    <div class="course-content">
                        <h4><a href="#">Photography Crash Course for Photographer</a></h4>    
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>
                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>82</span>
                            </div>
                           
                            <div class="course-price ">$80 <span class="del">$120</span></div>   
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="course-block course-style-2">
                    <div class="course-img">
                        <img src="assets/images/course/course3.jpg" alt="" class="img-fluid">
                        <span class="course-cat">Expert</span>
                    </div>
                    
                    <div class="course-content">
                        <h4><a href="#">React – The Complete Guide (React Router)</a></h4>  
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>

                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>83</span>
                            </div> 
                           
                            <div class="course-price ">$100 <span class="del">$180</span></div>   
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6">
                <div class="course-block course-style-2">
                    <div class="course-img">
                        <img src="assets/images/course/course2.jpg" alt="" class="img-fluid">
                        <span class="course-cat">Advanced</span>
                    </div>
                    
                    <div class="course-content">
                        <h4><a href="#">Photography Crash Course for Photographer</a></h4>    
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>
                        
                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>82</span>
                            </div> 
                           
                            <div class="course-price ">$80 <span class="del">$120</span></div>   
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="course-block course-style-2">
                    <div class="course-img">
                        <img src="assets/images/course/course1.jpg" alt="" class="img-fluid">
                        <span class="course-cat">Beginner</span>
                    </div>
                    
                    <div class="course-content">
                        <h4><a href="#">Information About UI/UX Design Degree</a></h4>  
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>

                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>82</span>
                            </div>
                           
                            <div class="course-price ">$50</div>   
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-4 col-md-6">
                <div class="course-block course-style-2">
                    <div class="course-img">
                        <img src="assets/images/course/course3.jpg" alt="" class="img-fluid">
                        <span class="course-cat">Design</span>
                    </div>
                    
                    <div class="course-content">
                        <h4><a href="#">React – The Complete Guide (React Router)</a></h4>    
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>

                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>82</span>
                            </div>
                           
                            <div class="course-price ">$100 <span class="del">$180</span></div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <nav class="blog-pagination text-center">
					<ul>
					  <li class="page-num active" ><a href="#">1</a></li>
					  <li class="page-num"><a href="#">2</a></li>
					  <li class="page-num"><a href="#">3</a></li>
					</ul>
				</nav>
            </div>
        </div>
    </div>
</section>

@endsection