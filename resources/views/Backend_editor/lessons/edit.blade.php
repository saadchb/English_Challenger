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
        margin-bottom: 1.5rem;
        /* Add space between form groups */
    }

    .form-group label {
        width: 8rem;
        /* Adjust label width */
    }

    .form-group .input-group {
        width: calc(100% - 8rem);
        /* Calculate input and select width */
    }

    .form-check-label {
        margin-right: 1.5rem;
        /* Add space between checkbox and label */
    }
</style>
@endsection
@section('content')
<?php

use App\Models\Course;

$courses = Course::all();
?>
<form action="{{ route('lessons.update', $lesson->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="sticky-top bg-white border-bottom  px-4 py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-xl font-bold text-gray-900">edit  lesson</h3>
            <div class="d-flex gap-3 align-items-center">
                <a href="/lessons" class="nav-link btn btn-outline-secondary"><i class="fa-solid fa-angle-left"></i> Back</a>
                <div class="position-relative">
                    <span class="position-absolute d-flex items-center left-0 pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                </div>

            </div>
        </div>

    </div><br>
    <div class="container-fluid mt--8">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <!-- Question input -->
                       <div><b>lesson :</b> {{ $lesson->title }}</div> <br>
                        <div class="form-group">
                            <label for="title"><b>Title</b></label>
                            <input type="text" class="form-control" name="title" placeholder="Enter a lesson" value='{{ $lesson->title }}'>
                            @error('title')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description"><b>Description</b></label>
                            <textarea class="form-control" id="description" name="description" rows="2" placeholder="Enter description">{{ $lesson->description }}</textarea>
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
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</form><br><br>

@endsection