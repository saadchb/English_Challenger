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
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HommeController;
use App\Models\Categorie;
use PharIo\Manifest\RequirementCollection;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Models\detiailsStudent;
use App\Models\Cart;
use App\Models\Curriculum;
use App\Models\Homme;


Route::get('/',[CourseController::class, 'indexEn'])->name('EnglishChallenger.index');
Route::get('/dachboard',function(){
    return view('Backend_editor.dachboard');
});

Route::get('/dachboard', [HommeController::class, 'index'])->name('dachboard');
Route::post('/video/store', [HommeController::class, 'store'])->name('video.store');
// Route::get('/', [HommeController::class, 'indexHm'])->name('home');

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
Route::post('/course/store',[ReviewController::class,'store'])->name('course.store');
// Route::post('/course/store',[ReviewController::class,'store'])->name('course.store');


Route::get('/page-certifcate',[BookController::class,'certifcat'])->name('EnglishCallenger.page-certifcate');
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

Route::resource('/Blogs',BlogController::class);
Route::get('/Blogs/{id}', 'BlogController@show')->name('EnglishChallenger.blog_detail');

Route::post('/Blogs/{blog}/comments', [CommentController::class, 'store'])->name('blogs.comments.store');

Route::get('/Bloges', [BlogController::class, 'indexBl'])->name('Bloges.index'); // Index route
Route::get('/Bloges/create', [BlogController::class, 'create'])->name('Bloges.create'); // Create route
Route::post('/Bloges', [BlogController::class, 'store'])->name('Bloges.store'); // Store route
Route::get('/Bloges/{blog}/edit', [BlogController::class, 'edit'])->name('Bloges.edit'); // edit route
Route::put('/Bloges/{blog}', [BlogController::class, 'update'])->name('Bloges.update'); // Update route
Route::delete('/Bloges/{blog}', [BlogController::class, 'destroy'])->name('Bloges.destroy'); // Delete route



Route::resource('/Blogs',BlogController::class);
Route::get('/Blogs/{id}', 'BlogController@show')->name('EnglishChallenger.blog_detail');

Route::post('/Blogs/{blog}/comments', [CommentController::class, 'store'])->name('blogs.comments.store');

Route::get('/Bloges', [BlogController::class, 'indexBl'])->name('Bloges.index'); // Index route
Route::get('/Bloges/create', [BlogController::class, 'create'])->name('Bloges.create'); // Create route
Route::post('/Bloges', [BlogController::class, 'store'])->name('Bloges.store'); // Store route
Route::get('/Bloges/{blog}/edit', [BlogController::class, 'edit'])->name('Bloges.edit'); // edit route
Route::put('/Bloges/{blog}', [BlogController::class, 'update'])->name('Bloges.update'); // Update route
Route::delete('/Bloges/{blog}', [BlogController::class, 'destroy'])->name('Bloges.destroy'); // Delete route



Route::post('/curriculum_list/next/{id}', [CurriculumController::class, 'next'])->name('curriculum_list.next');
Route::post('/curriculum_list/prev/{id}', [CurriculumController::class, 'prev'])->name('curriculum_list.prev');
///


Route::resource('/books',BookController::class);
Route::get('/E_library/book/{id}',[BookController::class,'show'])->name('EnglishChallenger.show');
Route::get('/E_Library',[BookController::class,'E_Library'])->name('EnglishCallenger.E_Library');
Route::get('/E_Library/Categories/{id}',[CategorieController::class, 'show'])->name('EnglishCallenger.show');

Route::get('/cart',[CartController::class,'index'])->name('EnglishChallenger.cart');
Route::post('/cart',[CartController::class,'store'])->name('cart.store');
Route::delete('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/checkout',[CheckoutController::class,'index'])->name('chekout.index');

Route::get('/checkout/order-received',[CheckoutController::class,'order'])->name('order.order-received');
Route::post('/Checkou/order-received/store',[CheckoutController::class,'store'])->name('order.store');
Route::get('/detailsStudents', [DetailsStudentController::class,'show'])->name('detailsStudents.show');



Route::get('/filter-products', [BookController::class,'E_Library'])->name('filter.products');
Route::get('/E_library', [BookController::class, 'E_Library'])->name('e_library');


Route::get('/First-test',function(){
    return view('EnglishChallenger.Quize');
})->name('Quiz');


        Route::get('/search', [SearchController::class, 'search'])->name('search');
        Route::get('/search-result', [SearchController::class, 'showResults'])->name('search.result');

        
Route::get('/Become-Teacher',[TeacherController::class,'index'])->name('Become_teacher');

Route::get('/Account',function (){
    return view('Account');
});