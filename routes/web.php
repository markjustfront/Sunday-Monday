<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCrudController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\EnsureUserIsAuthenticated;

use Illuminate\Support\Facades\Route;

Route::get('/register', [UserController::class, 'showRegistrationForm']);
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login'])->name('login');

// Route::get('/', function () {
//     return view('welcome');
// });

// returns the home page of the web page
Route::get('/', [HomeController::class, 'index'])->name('homepage');

// returns the home page with all posts
Route::get('/posts/all', PostCrudController::class . '@index')->name('posts.index')->middleware('user');
// returns the form for adding a post
Route::get('/posts/create', PostCrudController::class . '@create')->name('posts.create')->middleware('user');
// adds a post to the database
Route::post('/posts', PostCrudController::class . '@store')->name('posts.store')->middleware('user');
// returns a page that shows a full post
Route::get('/posts/{post}', PostCrudController::class . '@show')->name('posts.show')->middleware('user');
// returns the form for editing a post
Route::get('/posts/{post}/edit', PostCrudController::class . '@edit')->name('posts.edit')->middleware('user');
// updates a post
Route::put('/posts/{post}', PostCrudController::class . '@update')->name('posts.update')->middleware('user');
// deletes a post
Route::delete('/posts/{post}', PostCrudController::class . '@destroy')->name('posts.destroy')->middleware('user');

// update categories
Route::put('posts/{post}/category', [PostCrudController::class, 'updateCategory'])->name('post.updateCategory')->middleware('user');