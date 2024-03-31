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
use App\Http\Controllers\BookController;
use App\Http\Controllers\DetailsStudentController;
use App\Models\Categorie;
use PharIo\Manifest\RequirementCollection;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Models\Curriculum;
use App\Models\detailsStudent;
use App\Models\detiailsStudent;

Route::get('/',[CourseController::class, 'indexEn'])->name('EnglishChallenger.index');
Route::get('/dachboard',function(){
    return view('Backend_editor.dachboard');
});
Route::get('/Quize',function(){
    return view('EnglishChallenger.Quize');
});
Route::get('/studentPortofilio', function(){
    return view('EnglishChallenger.studentPortofilio');
});
Route::get('/E_Library',[BookController::class,'E_Library'])->name('EnglishCallenger.E_Library');


Route::get('/Schools_list',[SchoolController::class,'Schools_list'])->name('EnglishCallenger.Schools_list');
Route::get('/school/{id}', [SchoolController::class, 'show_school']);
Route::post('/school/store',[ReviewController::class,'store'])->name('school.store');

Route::get('/page-certifcate',function(){
    return view('EnglishChallenger.page-certifcate');
});
Route::get('/course_detail/{id}', [CourseController::class, 'show2'])->name('course_detail');
Route::get('/course_list',[CourseController::class,'indexCr']);

Route::post('/curriculum_list/{id}',[CurriculumController::class,'show'])->name('curricula.show');
Route::resource('/Courses',CourseController::class);
Route::post('/Requirements/store',[RequirementController::class, 'store'])->name('Requirements.store');
// Route::get('/Categories.index',[CategorieController::class,'index'])->name('Categories.index');
Route::resource('/Categories',CategorieController::class);

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

Route::post('/curriculum_list/next/{id}', [CurriculumController::class, 'next'])->name('curriculum_list.next');
Route::post('/curriculum_list/prev/{id}', [CurriculumController::class, 'prev'])->name('curriculum_list.prev');

Route::resource('/books',BookController::class);
Route::resource('/detailsStudents', DetailsStudentController::class);
Route::get('/detailsStudents', [DetailsStudentController::class,'show'])->name('detailsStudentss.show');
///
