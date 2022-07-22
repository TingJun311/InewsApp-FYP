<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function showSignIn() {
        return view('users.signIn');
    }

    public function showRegister() {
        return view('users.register');
    }
}
