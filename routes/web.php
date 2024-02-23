<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\QuizController;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/Layout', function () {
    return view('Backend_editor.Layout');
});

Route::get('/dachboard', function () {
    return view('Backend_editor.dachboard');
});

Route::resource('/Quizzes',QuizController::class);
Route::resource('/Questions',QuestionController::class);