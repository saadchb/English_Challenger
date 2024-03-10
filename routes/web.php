<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\QuizController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\LessonController;


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
Route::resource('/Schools',SchoolController::class);
Route::resource('/lessons',LessonController::class);

// Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');
// Route::get('/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
// Route::post('/lessons/store', [LessonController::class, 'store'])->name('lessons.store');
// Route::delete('/lessons/{id}', [LessonController::class, 'destroy'])->name('lessons.destroy');
// Route::get('/lessons/{id}', [LessonController::class, 'edit'])->name('lessons.edit');
// Route::put('/lessons/update', [LessonController::class, 'update'])->name('lessons.update');

// Route::get('/search-questions', [QuizController::class, 'searchQuestions']);
