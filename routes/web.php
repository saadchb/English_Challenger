<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\QuizController;
use App\Http\Controllers\SchoolController;

Route::get('/', function () {
    return view('Backend_editor.dachboard');
});
Route::get('/sh',function(){
    return view('Backend_editor.schools.sh');
});

// Route::get('/Layout', function () {
//     return view('Backend_editor.Layout');
// });



Route::resource('/Quizzes',QuizController::class);
Route::resource('/Questions',QuestionController::class);
// Route::post('/save-question', [QuestionController::class, 'saveQuestion']);
Route::resource('/Schools',SchoolController::class);

