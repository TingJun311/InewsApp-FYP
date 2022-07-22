<?php

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

// Log in page
Route::get('/signIn', [UsersController::class, 'showSignIn']);

// Register page
Route::get('/register', [UsersController::class, 'showRegister']);
// Registration
Route::get('/register/newUser', [UsersController::class, 'showRegister']);
