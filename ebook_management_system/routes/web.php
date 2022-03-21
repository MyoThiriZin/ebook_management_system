<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

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
    Route::resource('books','Admin\BookController');

    //Authors
    Route::resource('authors','Admin\Ajax\AuthorController');
    Route::get('/search', 'Admin\Ajax\AuthorController@search');

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

