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
// $Teacher = Teacher::count();
?>
<div class="sticky-top bg-white border-bottom navbar navbar-expand   px-4 py-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-xl font-bold text-gray-900">Dachboard</h2>
        <div class="d-flex gap-3  ml-12 ">
            <ul class="navbar-nav" style="margin-left: 580px;">
                <li class="nav-item dropdown ml-4">
                    <div style="display: flex;">
                        <img src="build/assets/images/pic-4.png" class="img-circle elevation-2" height="40px" width="40px" alt="Formateur Image">
                        <a href="#" class="nav-link" data-toggle="dropdown" class="d-block"><strong style="color: black;">SAAD CHAIB <i class="fa-solid fa-caret-down"></i></strong></a>
                        </a>
                        <div>
                            <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                                <span class="dropdown-item dropdown-header"><strong>Profile</strong></span>
                                <div class="dropdown-divider"></div>

                                <a href="#" class="dropdown-item">
                                    <i class=" fa-regular fa-gear text-info"></i> SETTING
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-power-off text-danger"></i> LOG OUT
                                </a>

                            </div>
                </li>


            </ul>

        </div>
    </div>
</div><br>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    @endsection