<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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
use App\Http\Controllers\MessageController;
use App\Models\detiailsStudent;
use App\Models\Cart;
use App\Models\Curriculum;
use App\Models\Homme;


// Route::get('/', [HommeController::class, 'indexHm'])->name('home');

// schools
Route::get('/Schools_list', [SchoolController::class, 'Schools_list'])->name('EnglishCallenger.Schools_list');
Route::get('/school/{id}', [SchoolController::class, 'show_school']);

//review
Route::post('/school/store', [ReviewController::class, 'store'])->name('school.store');
Route::post('/course/store', [ReviewController::class, 'store'])->name('course.store');
Route::delete('/Review/destroy/{id}',[ReviewController::class,'destroy'])->name('review.destroy');
// Route::resource('review', 'ReviewController');

// Route::post('/course/store',[ReviewController::class,'store'])->name('course.store');

//courses
Route::get('/', [CourseController::class, 'indexEn'])->name('EnglishChallenger.index');
Route::get('/course_detail/{id}', [CourseController::class, 'show2'])->name('course_detail');
Route::get('/course_list', [CourseController::class, 'indexCr']);

// teacher
Route::get('/Become-Teacher', [TeacherController::class, 'become_teacher'])->name('Become_teacher')->withoutMiddleware('auth.teacherAdmin');
Route::post('/become-teacher/store', [MessageController::class, 'store'])->name('contact.store');

Route::middleware('auth.teacherAdmin')->group(function () {
    //profile 
    Route::get('/admin/Profile/{id}', [TeacherController::class, 'show'])->name('profile.show');
    Route::put('/admin/Profile/update/{id}', [TeacherController::class, 'update'])->name('profile.update');
    Route::delete('/admin/Profile/destroy/{id}', [TeacherController::class, 'destroy'])->name('profile.destroy');
    Route::put('/admin/profile/change-password/{id}', [TeacherController::class, 'changePassword'])->name('profile.changePassword');

    //teachers
    Route::resource('/Teachers', TeacherController::class);


    // home
    Route::get('/dachboard', [HommeController::class, 'index'])->name('dachboard')->middleware('auth.teacher');
    Route::post('/video/store', [HommeController::class, 'store'])->name('video.store');



    // courses
    Route::resource('/Courses', CourseController::class);

    //Requirements
    Route::post('/Requirements/store', [RequirementController::class, 'store'])->name('Requirements.store');

    // tags
    Route::get('/Tags.index', [TagController::class, 'index'])->name('Tags.index');
    Route::post('/Tags.store', [TagController::class, 'store'])->name('Tags.store');

    // quizs
    Route::resource('/Quizzes', QuizController::class);

    // Questions
    Route::resource('/Questions', QuestionController::class);
    // Route::post('/save-question', [QuestionController::class, 'saveQuestion']);
    // books
    Route::resource('/books', BookController::class);
    // lessons
    Route::resource('/lessons', LessonController::class);

    // curriculm
    Route::resource('/Curricula', CurriculumController::class);
    Route::put('/CurriculaLessons/{id}', [CurriculumController::class, 'CL'])->name('CL.Update');
    Route::put('/CurriculaQuizzes/{id}', [CurriculumController::class, 'CQ'])->name('CQ.Update');
    //teachers
    Route::resource('/Teachers', TeacherController::class);
    Route::get('/Teachers/show/{id}', [TeacherController::class, 'show_teacher'])->name('teacher.show');

    //Messages route
    Route::resource('/admin/Messages', MessageController::class);
    //updating the isAdmin field:
    Route::put('/update-admin/{id}', [MessageController::class, 'accept_teacher'])->name('update.teacher');
    Route::put('/refuse-admin/{id}', [TeacherController::class, 'refuse_tacher'])->name('refuse.teacher');
    Route::delete('/delete-teacher/{id}', [TeacherController::class, 'remove_teacher'])->name('remove.teacher');

    //bloges
Route::get('/Bloges', [BlogController::class, 'indexBl'])->name('Bloges.index'); // Index route
Route::get('/Bloges/create', [BlogController::class, 'create'])->name('Bloges.create'); // Create route
Route::post('/Bloges', [BlogController::class, 'store'])->name('Bloges.store'); // Store route
Route::get('/Bloges/{blog}/edit', [BlogController::class, 'edit'])->name('Bloges.edit'); // edit route
Route::put('/Bloges/{blog}', [BlogController::class, 'update'])->name('Bloges.update'); // Update route
Route::delete('/Bloges/{blog}', [BlogController::class, 'destroy'])->name('Bloges.destroy'); // Delete route

});

//schools
Route::resource('/Schools', SchoolController::class);

// strat
//  !!!! go to controller of this is already authenticated
// students
Route::resource('/Students', StudentController::class);
// end


// blogs
Route::post('/Blogs/{blog}/comments', [CommentController::class, 'store'])->name('blogs.comments.store');

Route::resource('/Blogs', BlogController::class);
Route::get('/Blogs/{id}', 'BlogController@show')->name('EnglishChallenger.blog_detail');
// student login midleware curruclum

Route::post('/curriculum_list/{id}', [CurriculumController::class, 'show'])->name('curricula.show')->middleware('auth.student');
Route::post('/curriculum_list/next/{id}', [CurriculumController::class, 'next'])->name('curriculum_list.next')->middleware('auth.student');
Route::post('/curriculum_list/prev/{id}', [CurriculumController::class, 'prev'])->name('curriculum_list.prev')->middleware('auth.student');
Route::post('/general_test', [CurriculumController::class, 'general_test'])->name('general_test.take')->middleware('auth.student');
Route::post('/curriculum.quiz/{id}', [CurriculumController::class, 'checkQuiz'])->name('checkQuiz')->middleware('auth.student');


Route::get('/E_library/book/{id}', [BookController::class, 'show'])->name('EnglishChallenger.show');
Route::get('/E_Library', [BookController::class, 'E_Library'])->name('EnglishCallenger.E_Library');
Route::get('/filter-products', [BookController::class, 'E_Library'])->name('filter.products');
Route::get('/E_library', [BookController::class, 'E_Library'])->name('e_library');
Route::get('/page-certifcate', [BookController::class, 'certifcat'])->name('EnglishCallenger.page-certifcate');
Route::get('/E_Library', [BookController::class, 'E_Library'])->name('EnglishCallenger.E_Library');

//Categories
Route::get('/E_Library/Categories/{id}', [CategorieController::class, 'show'])->name('EnglishCallenger.show');
Route::get('/Categories.index', [CategorieController::class, 'index'])->name('Categories.index');


// Carts
Route::get('/cart', [CartController::class, 'index'])->name('EnglishChallenger.cart');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

// DetailsStudent
// Route::get('/detailsStudents/{id}', [DetailsStudentController::class, 'show'])->name('detailsStudentss.show');
Route::get('/detailsStudents/{id}', [DetailsStudentController::class, 'show'])->name('detailsStudents.show')->middleware('auth.student');
Route::get('/buyCourse/{id}', [DetailsStudentController::class, 'buyCourse'])->name('buyCourse')->middleware('auth.student');

//checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('chekout.index');
Route::get('/checkout/order-received/{id}', [CheckoutController::class, 'order'])->name('order.order-received');
Route::post('/Checkou/order-received/store', [CheckoutController::class, 'store'])->name('order.store');

//seachr
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search-result', [SearchController::class, 'showResults'])->name('search.result');

// Account
Route::get('/selection', [AccountController::class, 'index'])->name('selection');
Route::get('/logined', [AccountController::class, 'logined'])->name('logined');


// login
Route::group(['namespace', 'Auth'], function () {
    Route::get('/login/{type}', [LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');
    Route::get('/logout/{type}', [LoginController::class, 'logout'])->name('logout');
});

Route::post('/loginShool',[LoginController::class, 'loginShool'])->name('loginShool');
Route::get('/loginShoolForm',[LoginController::class, 'loginShoolForm'])->name('loginShoolForm');

// register
Route::get('/registerTeacherForm', [RegisterController::class, 'registerTeacherForm'])->name('registerTeacherForm');
Route::get('/registerStudentForm', [RegisterController::class, 'registerStudentForm'])->name('registerStudentForm');

// student
Route::put('/detailsStudent/update/{id}',[DetailsStudentController::class, 'update'])->name('detailsStudent.update');
Route::put('/detailsStudent/update/change-password/{id}', [DetailsStudentController::class, 'changePassword'])->name('detailsStudent.changePassword');

// schools
Route::get('/registerSchoolFrom', [RegisterController::class,'registerSchoolFrom'])->name('registerSchoolFrom');


Route::delete('/detailsStudent/delete/{id}', [DetailsStudentController::class, 'destroy'])->name('detailsStudent.destroy');
// Anonume
Route::get('/First-test', function () {
    return view('EnglishChallenger.Quize');
})->name('Quiz');

Route::get('/studentPortofilio', function () {
    return view('EnglishChallenger.studentPortofilio');
});


//login school

// Route::get('/loginShoolFormForce',[LoginController::class, 'loginShoolForm']);


//
