@extends('Backend_editor.Layout')
@section('title','dachboard')

@section('content')
<?php

use App\Models\Course;
use App\Models\School;
use App\Models\Student;
use App\Models\Blog;

$school = School::count();
$course = Course::count();
$Student = Student::count();
$blog = Blog::count();
// $Teacher = Teacher::count();
?>

<br>

<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <div class="p-3 bg-light shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$Student}}</h3>
                    <p class="fs-5">Total students</p>
                </div>
                <i class="fa-regular fa-users fs-1 dark-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-light shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$school}}</h3>
                    <p class="fs-5">Total Schools</p>
                </div>
                <i class="fa-regular fa-school fs-1 dark-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-light shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$course}}</h3>
                    <p class="fs-5">Total Course</p>
                </div>
                <i class="fa-regular fa-book-open fs-1 dark-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 bg-light shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$blog}}</h3>
                    <p class="fs-5">Total Blogs</p>
                </div>
                <i class="fa-regular fa-book fs-1 dark-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-light shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">0</h3>
                    <p class="fs-5">Total teachers</p>
                </div>
                <!-- <i class="fa-solid fa-chalkboard-user dark-text border rounded-full secondary-bg p-3"></i> -->
                <i class="fa-regular fa-chalkboard-user fs-1 dark-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h4 class="box-title">Latest Students</h4>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding" style="">
            <ul class="users-list clearfix">
                                                <li>
                    <img src="data:image/png;base64,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" alt="" height="50" width="50">
                    <a class="users-list-name" href="#" title="test">Test</a>
                    <span class="users-list-date">2 days ago</span>
                  </li>
                                  <li>
                    <img src="data:image/png;base64,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" alt="" height="50" width="50">
                    <a class="users-list-name" href="#" title="dawdad">Dawdad</a>
                    <span class="users-list-date">6 days ago</span>
                  </li>
                                  <li>
                    <img src="data:image/png;base64,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" alt="" height="50" width="50">
                    <a class="users-list-name" href="#" title="test">Test</a>
                    <span class="users-list-date">6 days ago</span>
                  </li>
                                  <li>
                    <img src="data:image/png;base64,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" alt="" height="50" width="50">
                    <a class="users-list-name" href="#" title="Jhon Doe">Jhon Doe</a>
                    <span class="users-list-date">6 years ago</span>
                  </li>
                                          </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.box-body -->
         
          <div class="box-footer text-center" style="">
            <a href="https://quickquiz.mediacity.co.in/public/admin/users" class="uppercase">View All Students</a>
          </div>
       
          <!-- /.box-footer -->
        </div>
      </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    @endsection