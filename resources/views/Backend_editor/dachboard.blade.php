@extends('Backend_editor.Layout')
@section('title','dachboard')

@section('content')
<?php

use App\Models\Course;
use App\Models\School;
use App\Models\Student;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Teacher;

$school = School::count();
$course = Course::count();

$Student = Student::count();
$Teacher = Teacher::count();
$books = Book::count();
$blog = Blog::count();

$StudentN = Student::where('teacher_id',auth('teacher')->user()->id)
->count();

$booksN = Book::where('teacher_id',auth('teacher')->user()->id)
->count();
$blogN = Blog::where('teacher_id',auth('teacher')->user()->id)
->count();
$students = Student::orderBy('created_at', 'desc')->paginate(4);


// $Teacher = Teacher::count();
?>

<br>
<div class="container-fluid px-4">  
  @if (auth('teacher')->user()->isAdmin == 1)
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
          <h3 class="fs-2">{{$books}}</h3>
          <p class="fs-5">Total Books</p>
        </div>
        <i class="fa-regular fa-books fs-1 dark-text border rounded-full secondary-bg p-3"></i>
      </div>
    </div>
    <div class="col-md-3">
      <div class="p-3 bg-light shadow-sm d-flex justify-content-around align-items-center rounded">
        <div>
          <h3 class="fs-2">{{$Teacher}}</h3>
          <p class="fs-5">Total teachers</p>
        </div>
        <!-- <i class="fa-solid fa-chalkboard-user dark-text border rounded-full secondary-bg p-3"></i> -->
        <i class="fa-regular fa-chalkboard-user fs-1 dark-text border rounded-full secondary-bg p-3"></i>
      </div>
    </div>
  </div>
  @elseif(auth('teacher')->user()->isAdmin == 2)
  <div class="row g-3 my-2">
    <div class="col-md-3">
      <div class="p-3 bg-light shadow-sm d-flex justify-content-around align-items-center rounded">
        <div>
          <h3 class="fs-2">{{$StudentN}}</h3>
          <p class="fs-5">Total students</p>
        </div>
        <i class="fa-regular fa-users fs-1 dark-text border rounded-full secondary-bg p-3"></i>
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
          <h3 class="fs-2">{{$blogN}}</h3>
          <p class="fs-5">Total Blogs</p>
        </div>
        <i class="fa-regular fa-book fs-1 dark-text border rounded-full secondary-bg p-3"></i>
      </div>
    </div>
    <div class="col-md-3">
      <div class="p-3 bg-light shadow-sm d-flex justify-content-around align-items-center rounded">
        <div>
          <h3 class="fs-2">{{$booksN}}</h3>
          <p class="fs-5">Total Books</p>
        </div>
        <i class="fa-regular fa-books fs-1 dark-text border rounded-full secondary-bg p-3"></i>
      </div>
    </div>
  </div>
  @endif

  <br><br>
  <div class="row">

    <div class="col-lg-12">
      <!-- USERS LIST -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Latest Students</h3>
          <?php
          $countstudens = Student::where('teacher_id',auth('teacher')->user()->id)->latest()->count();
          ?>
          <div class="card-tools">
            <span class="badge badge-danger">{{$countstudens}}</span>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0" style="display: block;">
          <ul class="users-list clearfix">
            @foreach ($students as $student)
            @if(Auth::guard('teacher')->user()->id == $student->teacher_id || Auth::guard('teacher')->user()->isAdmin === 1 )
            <li>
              <div align="center">
                @if (empty($message->picture))
                <img src="{{ asset('build/assets/images/clients/user.png') }}" style="width: 70px !important; height: 70px !important;">

                @else
                <img src="{{ asset('storage/'.$student->picture) }}" alt="{{$student->last_name}}" style="width: 70px !important; height: 70px !important;">
                @endif
                <a class="users-list-name" href="{{route('Students.show',$student->id)}}">{{$student->first_name}}</a>
                <span class="users-list-date">{{$student->created_at->diffForHumans()}}</span>
              </div>
            </li>
            @endif
            @endforeach

          </ul>
        </div>
        <div class="card-footer text-center" style="display: block;">
          <a href="{{route('Students.index')}}">View All Students</a>
        </div>
      </div>
    </div>
  </div>
  <br><br>

  @if (auth('teacher')->user()->isAdmin == 1)

  <!-- Display Featured Video -->
  <div class="container mb-1 col-lg-9">
    @if(!empty($featuredVideo))
    <!-- <iframe src="{{ $featuredVideo->video }}" class="w-100 shadow-1-strong rounded mb-4" style="height: 400px;" title="Featured YouTube video" allowfullscreen>
    </iframe> -->
    <video class="w-100 shadow-1-strong rounded mb-4" style="height: 200px;" controls>
            <source src="{{ asset('storage/' . $featuredVideo->video_import) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @else
    <p></p>
    @endif
  </div>

  <!-- Display Normal Videos -->
  <div class="row">
    @foreach($normalVideos as $video)
    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
      <!-- <iframe src="{{ $video->video }}" class="w-100 shadow-1-strong rounded mb-4" style="height: 200px;" title="Normal YouTube video" allowfullscreen>
      </iframe> -->
      <video class="w-100 shadow-1-strong rounded mb-4" style="height: 200px;" controls>
            <source src="{{ asset('storage/' . $video->video_import) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    @endforeach
    <div class="d-flex justify-content-center mt-4">
      {{ $normalVideos->links('pagination::bootstrap-4') }}
    </div>
    <style>
      /* Custom pagination color */
      .pagination .page-link {
        color: red;
      }

      .pagination .page-item.active .page-link {
        background-color: red;
        border-color: red;
      }
    </style>
  </div>

</div>

<div class="sticky-top bg-white border-bottom px-4 py-3">
  <div class="d-flex justify-content-between align-items-center">
    <h3 class="text-xl font-bold text-gray-900"><i class="fa-light fa-gear"></i> Settings</h3>
    <div class="d-flex gap-3 align-items-center">
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
        <h4 class="mb-0">Add New Video</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
                <div class="form-group">
            <label ><strong>Import Your Video:</strong></label>
            <input type="file" class="form-control" id="videoImport" name="videoImport" >
          </div>
          @error('videoImport')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1">
            <label class="form-check-label fst-italic" for="is_active">Video will appear as the main video</label>
          </div><br>
          <div class="mt-3">
            <button type="submit" class="btn btn-danger">Save</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
</div>
@endif
<br><br>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

@endsection