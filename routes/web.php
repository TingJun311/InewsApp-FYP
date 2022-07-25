<?php

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

// Log in page
Route::get('/signIn', [UsersController::class, 'showSignIn'])->name('login')->middleware('guest');

// Register page
Route::get('/register', [UsersController::class, 'showRegister'])->middleware('guest');

// logUser out
Route::post('/logout', [UsersController::class, 'logUserOut'])->middleware('auth');

// Sign in user
Route::post('/user/login/authenticate', [UsersController::class, 'authenticate'])->middleware('guest');

// Oauth Google
Route::get('/auth/google', [OauthController::class, 'loginWithGoogle'])->middleware('guest');
Route::get('/auth/google/callback', [OauthController::class, 'callBackGoogle'])->middleware('guest');