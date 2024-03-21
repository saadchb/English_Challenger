<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuizController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TagController;
use App\Models\Categorie;
use PharIo\Manifest\RequirementCollection;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;




Route::get('/',[CourseController::class, 'indexEn'])->name('EnglishChallenger.index');
Route::get('/dachboard',function(){
    return view('Backend_editor.dachboard');
});
Route::get('/Quize',function(){
    return view('EnglishChallenger.Quize');
});

Route::get('/course_detail/{id}',[CourseController::class,'show2'])->name('course_detail');
Route::get('/course_list',[CourseController::class,'indexCr']);

Route::get('/curriculum_list',function(){
    return view('EnglishChallenger.curriculum_list');
});
Route::resource('/Courses',CourseController::class);
Route::post('/Requirements/store',[RequirementController::class, 'store'])->name('Requirements.store');
Route::get('/Categories.index',[CategorieController::class,'index'])->name('Categories.index');
Route::post('/Categories.store',[CategorieController::class, 'store'])->name('Categories.store');
Route::get('/Tags.index',[TagController::class, 'index'])->name('Tags.index');
Route::post('/Tags.store',[TagController::class, 'store'])->name('Tags.store');
Route::resource('/Quizzes',QuizController::class);
Route::resource('/Questions',QuestionController::class);
// Route::post('/save-question', [QuestionController::class, 'saveQuestion']);
Route::resource('/Schools',SchoolController::class);

Route::resource('/Students',StudentController::class);
Route::resource('/lessons',LessonController::class);

Route::resource('/Curricula',CurriculumController::class);
Route::put('/CurriculaLessons/{id}', [CurriculumController::class, 'CL'])->name('CL.Update');
Route::put('/CurriculaQuizzes/{id}', [CurriculumController::class, 'CQ'])->name('CQ.Update');


///

