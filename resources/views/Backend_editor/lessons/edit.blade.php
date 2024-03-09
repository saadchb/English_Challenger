@extends('Backend_editor.Layout')
@section('title','Add_lesson')
@section('styles')
<!-- Include additional stylesheets for this view -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    /* Custom CSS for navbar */
    .navbar-custom {
        padding: 10px 0;
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
    }

    .navbar-nav {
        align-items: center;
    }

    .nav-item {
        margin-right: 15px;
    }

    #saveBtn {
        margin-left: 15px;
    }

    /* Custom CSS for form */
    .form-group {
        margin-bottom: 1.5rem; /* Add space between form groups */
    }

    .form-group label {
        width: 8rem; /* Adjust label width */
    }

    .form-group .input-group {
        width: calc(100% - 8rem); /* Calculate input and select width */
    }

    .form-check-label {
        margin-right: 1.5rem; /* Add space between checkbox and label */
    }
</style>
@endsection
@section('content')
<?php 
use App\Models\Course;
$courses=Course::all();
?>
<form action="{{ route('lessons.update', $lesson->id) }}" method="POST" enctype="multipart/form-data" >
@csrf
@method('PUT') 
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-2 pr-7" style="width: 83%; margin-left: 18%; margin-bottom: 530px;">
    <a class="navbar-brand" href="#">Update a Lesson</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="/lessons" class="nav-link btn btn-outline-secondary  "><i class="fa-solid fa-angle-left"></i> Back</a>
            </li>
            <li class="nav-item">
                <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
            </li>
        </ul> 
    </div>
</nav>

<br>

<div class="countainer mt-5 m-4">

    <div class="modal-body">
        <!-- Question input -->
        <div class="form-group">
    <label for="title"><b>Title</b></label>
    <input type="text" class="form-control" name="title" placeholder="Enter a lesson" value='{{ $lesson->title }}'>
    @error('title')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description"><b>Description</b></label>
    <textarea class="form-control" id="description" name="description" rows="2" placeholder="Enter description" >{{ $lesson->description }}</textarea>
    @error('description')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="course_id">Course</label>
    <select class="form-control" id="course_id" name="course_id">
        <option value="">Choose...</option>
        @foreach($courses as $course)
        <option value="{{ $course->id }}" {{ $lesson->course_id == $course->id ? 'selected' : '' }}>{{ $course->title }}</option>
        @endforeach
    </select>
    @error('course_id')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="duration" class="form-label"><b>Duration</b></label>
    <div class="input-group">
    <input id="duration" type="time" class="form-control" name="duration" value="{{ $lesson->duration }}">
    @error('duration')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    <!--    <select class="form-select" name="duration_unit">
            <option value="minute">Minute(s)</option>
            <option value="hour">Hour(s)</option>
            <option value="day">Day(s)</option>
            <option value="week">Week(s)</option>
        </select> -->
    </div>
</div> <br>
        
<div class="form-group form-check">
    <input id="priview" type="checkbox" class="form-check-input" name="priview" {{ $lesson->priview ? 'checked' : '' }}>
    <label for="priview" class="form-check-label">Preview</label>
    <span>Students can view this lesson content without taking the course.</span>
    @error('priview')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
</div>

    </div>

</div>
</form>

@endsection
