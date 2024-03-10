<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\QuizController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\TagController;
use App\Models\Categorie;
use PharIo\Manifest\RequirementCollection;
use App\Http\Controllers\SchoolController;
<<<<<<< HEAD
use App\Http\Controllers\StudentController;
=======
use App\Http\Controllers\LessonController;

>>>>>>> origin/master

Route::get('/', function () {
    return view('Backend_editor.dachboard');
});
Route::get('/sh',function(){
    return view('Backend_editor.schools.sh');
});

// Route::get('/Layout', function () {
//     return view('Backend_editor.Layout');
// });



// Route::get('/index', function () {
//     return view('Backend_editor.courses.index');
// })->name('courses.index');;
// Route::get('/create', function () {
//     return view('Backend_editor.courses.Add_Course');
// })->name('courses.Add_Coures');
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
<<<<<<< HEAD

Route::resource('/Students',StudentController::class);
=======
Route::resource('/lessons',LessonController::class);

>>>>>>> origin/master
