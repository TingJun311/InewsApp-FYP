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

    public function logUserOut(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function authenticate (Request $request) {
        $formValue = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formValue)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Invalid Credentials'
        ])->onlyInput('email');
    }
}
