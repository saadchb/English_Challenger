@extends('Backend_editor.Layout')
@section('title','dachboard')

@section('content')
<?php

use App\Models\Course;
use App\Models\School;
use App\Models\Student;

$school = School::count();
$course = Course::count();
$Student = Student::count();
$students = Student::orderBy('created_at', 'desc')->paginate(4);


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
          <h3 class="fs-2">0</h3>
          <p class="fs-5">Total teachers</p>
        </div>
        <!-- <i class="fa-solid fa-chalkboard-user dark-text border rounded-full secondary-bg p-3"></i> -->
        <i class="fa-regular fa-chalkboard-user fs-1 dark-text border rounded-full secondary-bg p-3"></i>
      </div>
    </div>
  </div>
  <br><br>
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
          @foreach ($students as $student)
          <li>
          <img src="{{ asset('storage/'.$student->picture) }}" alt="{{$student->last_name}}" width="50px" height="50px" class="align-center">
            <a class="users-list-name" title="test">{{$student->first_name}}</a>
            <span class="users-list-date">{{$student->created_at}}</span>
          </li>
          @endforeach
        </ul>
        <!-- /.users-list -->
      </div>
      <!-- /.box-body -->

      <div class="box-footer text-center" style="">
        <a href="/Students" class="uppercase">View All Students</a>
      </div>

      <!-- /.box-footer -->
    </div>
    <br><br>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

@endsection