<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\authorlistController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['admin']], function () {
    //Books
    Route::resource('books', 'Admin\BookController');

    //Borrow
    Route::resource('borrows', 'Admin\BorrowController');

    //Authors
    Route::resource('authors', 'Admin\Ajax\AuthorController');
    Route::get('/author/search', 'Admin\Ajax\AuthorController@search')->name('author.search');

    //Author export import
    Route::get('author/export', 'Admin\Ajax\AuthorController@export');
    Route::get('author/importFile', 'Admin\Ajax\AuthorController@importFile');
    Route::post('author/import', 'Admin\Ajax\AuthorController@import');

    //Dashboard
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard.index');

    //Category
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/search', [CategoryController::class, 'search'])->name('category.search');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');

    //Category export import
    Route::get('category/export', 'Admin\CategoryController@export');
    Route::get('category/importFile', 'Admin\CategoryController@importFile');
    Route::post('category/import', 'Admin\CategoryController@import');

    Route::get('/adminprofile','Admin\AdminController@show')->name('adminprofile');
    Route::resource('/users','Admin\UserController');
    Route::resource('/contact','Admin\ContactUsController');

});

Route::get('/register', 'Admin\Auth\AuthController@showRegistrationView')->name('register');
Route::post('/register', 'Admin\Auth\AuthController@storeUser');

Route::get('/login', 'Admin\Auth\AuthController@showLoginView')->name('login');
Route::post('/login', 'Admin\Auth\AuthController@login');
Route::get('logout', 'Admin\Auth\AuthController@logout')->name('logout');

Route::get('forget-password', 'Admin\Auth\ForgotPasswordController@showForgetPasswordForm')->name('forget.password');
Route::post('forget-password', 'Admin\Auth\ForgotPasswordController@submitForgetPasswordForm')->name('submit.forget.password');
Route::get('reset-password/{token}', 'Admin\Auth\ForgotPasswordController@showResetPasswordForm')->name('reset.password');
Route::post('reset-password', 'Admin\Auth\ForgotPasswordController@submitResetPasswordForm')->name('submit.reset.password');

/* For user panel */
Route::get('/user/register', 'User\Auth\AuthController@showRegistrationView')->name('user#register');
Route::post('/user/register', 'User\Auth\AuthController@storeUser')->name('user#register_create');

Route::get('/user/login', 'User\Auth\AuthController@showLoginView')->name('user#login_view');
Route::post('/user/login', 'User\Auth\AuthController@login')->name('user#login');
Route::get('user/logout', 'User\Auth\AuthController@logout')->name('user#logout');

Route::get('user/forget-password', 'User\Auth\ForgotPasswordController@showForgetPasswordForm')->name('user#forget.password');
Route::post('user/forget-password', 'User\Auth\ForgotPasswordController@submitForgetPasswordForm')->name('user#submit.forget.password');
Route::get('user/reset-password/{token}', 'User\Auth\ForgotPasswordController@showResetPasswordForm')->name('user#reset.password');
Route::post('user/reset-password', 'User\Auth\ForgotPasswordController@submitResetPasswordForm')->name('user#submit.reset.password');

//User ContactUs
Route::get('contact/create','User\ContactUsController@create')->name('user#contact_create');
Route::post('contact/store','User\ContactUsController@store')->name('user#contact_store');

//Book Detail
Route::get('book/detail/{id}','User\BookController@getBookByID')->name('user#book_detail');
Route::get('borrow/store/{id}','User\BookController@storeBorrowBook')->name('user#store_book_borrow');


//User Home
Route::get('user','User\HomeController@index')->name('user');

//User Book
Route::get('/userbooks', 'User\BookController@index')->name('user#books.index');
//Search
Route::post('book/search', 'User\BookController@search')->name('user#booksearch');

Route::get('bookrentalexpire', function () {
    Artisan::call('bookrentalexpire:email');
    return redirect()->back()->with("success_msg", ("Email send successfull"));
})->name('bookrentalexpire');

