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

      <div class="box-footer text-center" >
        <a href="/Students" class="uppercase">View All Students</a>
      </div>

      <!-- /.box-footer -->
    </div>
    <br><br>
    <hr>
    <br><br>
    <h2>Videos view from the home page:</h2>
    <br><br>
    <div class="container col-lg-9 col-md-12 mb-9 mb-lg-0">

<!-- Display Featured Video -->
<div class="container mb-1 col-lg-9">
    @if(!empty($featuredVideo))
        <iframe
          src="{{ $featuredVideo->video }}"
          class="w-100 shadow-1-strong rounded mb-4"
          style="height: 400px;"
          title="Featured YouTube video" allowfullscreen>
        </iframe>
        @else
        <p></p>
    @endif
</div>

<!-- Display Normal Videos -->
<div class="row">
    @foreach($normalVideos as $video)
        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <iframe
              src="{{ $video->video }}"
              class="w-100 shadow-1-strong rounded mb-4"
              style="height: 200px;"
              title="Normal YouTube video" allowfullscreen>
            </iframe>
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
                <form action="{{ route('video.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="video_url"><strong>YouTube Video URL:</strong></label>
                        <input type="text" class="form-control" id="video_url" name="video" placeholder="Enter YouTube video URL" required>
                        @error('video')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
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
<br><br>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
