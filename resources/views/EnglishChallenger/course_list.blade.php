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
        <div class="row" id="showCourses">

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="blog-pagination text-center">
                        <ul class="pagination">
                            @if ($courses->previousPageUrl())
                            <li class="page-num ">
                                <a style="width: 115px;" href="{{ $courses->previousPageUrl() }}">Previous</a>
                            </li>
                            @endif

                            @for ($i = 1; $i <= $courses->lastPage(); $i++)
                                <li class="page-num {{ $i == $courses->currentPage() ? 'active' : '' }}">
                                    <a href="{{ $courses->url($i) }}">{{ $i }}</a>
                                </li>
                                @endfor

                                @if ($courses->nextPageUrl())
                                <li class="page-num ">
                                    <a style="width: 90px;" href="{{ $courses->nextPageUrl() }}">Next</a>
                                </li>
                                @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>



</section>

<script>
    const courses = @json($courses);
    document.getElementById('inputSearch').addEventListener('input', function(e) {
        const coursesSearch = courses.data.filter((course) => course.title.toLowerCase().search(e.target.value.toLowerCase()) !== -1)
        console.log(e.target.value)
        showCourses(coursesSearch);
    })

    function showCourses(table) {
        let htmlCu = '';
        for (var i = 0; i < table.length; i++) {
            htmlCu += `
    <div class="course-item cat1 cat3 col-lg-4 col-md-6" >
        <div class="course-block" >
            <div class="course-img">
                <img src="{{ asset('storage/') }}/${table[i].img}" alt="" style="width:350px; height: 280px;" class="img-fluid">
                <span class="course-label">${table[i].level}</span>
            </div>

            <div class="course-content">


                <h4><a href="/course_detail/${table[i].id}">${table[i].title}</a></h4>
                <div class="rating">
    ${table[i].rating == 1 ? `
            <!-- Render HTML for a review with a rating of 1 -->
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>

            ` : ''}
    ${table[i].rating == 2 ? `
            <!-- Render HTML for a review with a rating of 2 -->
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>

            ` : ''}
    ${table[i].rating == 3 ? `
            <!-- Render HTML for a review with a rating of 3 -->
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>

            ` : ''}
    ${table[i].rating == 4 ? `
            <!-- Render HTML for a review with a rating of 4 -->
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>

            ` : ''}
    ${table[i].rating == 5 ? `
            <!-- Render HTML for a review with a rating of 5 -->

            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>` : ''}

            ${table[i].rating == undefined || table[i].rating == null || table[i].rating == '' ?
            `
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            <a href="#"><i class="fa fa-star text-secondary"></i></a>
            `:''
        }
        <span>${table[i].rating}.00</span>
</div>
                <p>${table[i].description}</p>

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