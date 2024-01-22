<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/Layout', function () {
    return view('Backend_editor.Layout');
});

Route::get('/dachboard', function () {
    return view('Backend_editor.dachboard');
});

Route::get('/Courses', function () {
    return view('Backend_editor.Courses');
});

Route::get('/Add_Course', function () {
    return view('Backend_editor.Add_Course');
});

Route::get('/Assignments', function () {
    return view('Backend_editor.Assignments');
});

Route::get('/Lessons', function () {
    return view('Backend_editor.Lessons');
});

Route::get('/Quizzes', function () {
    return view('Backend_editor.Quizzes');
});

Route::get('/Questions', function () {
    return view('Backend_editor.Questions');
});

