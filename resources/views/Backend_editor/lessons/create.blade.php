@extends('Backend_editor.Layout')
@section('title','Add_lesson')

@section('content')
<?php

use App\Models\Course;

$courses = Course::all();
?>
<div class="container-fluid mt--8">
    <form action="{{route('lessons.store')}}" method="Post" enctype="multipart/form-data">
        @csrf
    <input type="hidden" name="teacher_id" value="{{Auth()->guard('teacher')->user()->id}}">

        <div class="sticky-top bg-white border-bottom  px-4 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-xl font-bold text-gray-900">Add new lesson</h3>
                <div class="d-flex gap-3 align-items-center">
                    <a href="/lessons" class="nav-link btn btn-outline-secondary"><i class="fa-solid fa-angle-left"></i> Back</a>
                    <div class="position-relative">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                    </div>
                </div>
            </div>

        </div><br>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="form-group">
                            <label for="title"><b>Title</b></label>
                            <input type="text" class="form-control" name="title" placeholder="Enter a lesson" value='{{old("title")}}'>
                            @error('title')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description"><b>Description</b></label>
                            <textarea class="form-control" id="description" name="description" rows="2" placeholder="Enter description" value='{{old("description")}}'></textarea>
                            @error('description')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description"><b>Link of video </b><i class="fab fa-youtube"></i></label>
                            <textarea class="form-control" id="video_link" name="video_link" rows="2" placeholder="link of video from youtube" value='{{old("video_link")}}'></textarea>
                            @error('video_link')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-group form-group col-4">
                            <input id="_lp_duration" name="duration" type="number" class="form-control" value="0">
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
                            <input id="priview" type="checkbox" class="form-check-input" name="priview" {{ old('priview') ? 'checked' : '' }}>
                            <label for="priview" class="form-check-label">Preview</label>
                            <span>Students can view this lesson content without taking the course.</span>
                        </div>

                    </div>

                </div>
            </div>
        </div>
</div>
</form>
<br><br>
@endsection
