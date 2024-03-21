@extends('layouts.app')
@section('title', 'Course list')
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
                                <input type="text" placeholder="Search our courses" class="form-control" id="inputSearch">
                                <label><i class="fa fa-search"></i></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="container">
        <div class="row">
          @foreach($courses as $course)
            <div class="col-lg-4 col-md-6">
                <div class="course-block course-style-2">
                    <div class="course-img">
                        <img src="{{ asset('storage/'.$course->img) }}" alt="" class="img-fluid">
                        <span class="course-cat">{{$course->level}}</span>
                    </div>
                    
                    <div class="course-content">
                       
                        <h4><a href="#">{{$course->title}}</a></h4>  
                         
                        <p>{{$course->description}}</p>
                      
                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>82</span>
                            </div> 
                           
                         <h4>  
                            <span>
                                <span class=" font-medium text-gray-900">
                                    @if ($course->regular_price && !$course->sale_price)
                                        <span class=" font-medium text-gray-900">
                                            <span class="uppercase"> 
                                                ${{ $course->regular_price }}
                                            </span>
                                        </span>
                                    @endif
                                    @if ($course->regular_price && $course->sale_price)
                                        <span class=" font-medium text-gray-900">
                                            <span class="line-through pr-2 text-gray-500" style="font-size:35px;">
                                                ${{ $course->sale_price }}</span><span>${{ $course->regular_price }}    
                                            </span>
                                        </span>
                                    @endif
                                    @if (!$course->regular_price && !$course->sale_price)
                                        <span class="uppercase">Free</span>
                                    @endif
                                </span>
                            </span>
                         </h4>
                        </div>
                    </div>
                </div>
            </div>
          @endforeach
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
                    </nav>
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
                        <span class="course-student"><i class="bi bi-group"></i>${table[i].fake_students_enrolled == null ? 0:table[i].fake_students_enrolled }</span>
                        <span class="course-duration"><i class="bi bi-badge3"></i>${table[i].nblessonsbycourses} Lessons</span>
                    </div>
                    <div class="course-price ">
                        <span>
                        ${ table[i].regular_price && !table[i].sale_price ? `
                                        <span class="font-medium text-gray-900 uppercase">${table[i].regular_price}</span>
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

                </div>
            </div>
        </div>
    </div>
    `;
            }
            document.getElementById('showCourses').innerHTML = htmlCu
        }
        showCourses(courses.data)
    </script>
@endsection
