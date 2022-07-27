<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OauthController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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
    return view('main');
});

// Article
Route::post("/news/articles/", [NewsController::class, 'showNews']);

// For auth users bookmarks
Route::get("/bookmarks/{userId}", [BookmarkController::class, 'viewBookmarks'])->middleware('auth');

// When user search
Route::get('/search', [NewsController::class, 'showResult']);

// When user selected the news categories
Route::get("/category", [NewsController::class, 'showResult']);

// Log in page
Route::get('/signIn', [UsersController::class, 'showSignIn'])->name('login')->middleware('guest');

// Register page
Route::get('/register', [UsersController::class, 'showRegister'])->middleware('guest');

// logUser out
Route::post('/logout', [UsersController::class, 'logUserOut'])->middleware('auth');

// Sign in user
Route::post('/user/login/authenticate', [UsersController::class, 'authenticate'])->middleware('guest');

// User profile
Route::get("/user/profile/{userId}", [UsersController::class, 'showProfile'])->middleware('auth');

// Oauth Google
Route::get('/auth/google', [OauthController::class, 'loginWithGoogle'])->middleware('guest');
Route::get('/auth/google/callback', [OauthController::class, 'callBackGoogle'])->middleware('guest');