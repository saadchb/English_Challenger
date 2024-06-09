@extends('Backend_editor.Layout')
@section('title','Add_lesson')
@section('styles')
<!-- Include additional stylesheets for this view -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
                        <div class="input-group form-group col-4">
                            <input id="_lp_duration"  name="duration" type="number" class="form-control" value="{{$lesson->duration}}">
                            <select class="form-select " name="duration_unit">
                                <option value="Minutes">Minute(s)</option>
                                <option value="hour">Hour(s)</option>
                                <option value="day">Day(s)</option>
                                <option value="week">Week(s)</option>
                            </select>
                        </div>
                        @error('duration')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        <br>


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
