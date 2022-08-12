<?php

namespace App\Http\Controllers;

use Cookie;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

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

        if ($request->has('rememberMe')) {
            // 1440 mins means 24 hours
            Cookie::queue('userEmail', $request->email, 1440);
            Cookie::queue('userPw', $request->password, 1440);
        }
        if (auth()->attempt($formValue)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Invalid Credentials'
        ])->onlyInput('email');
    }

    public function showProfile ($userId) {

        if ($userId == auth()->id()) {
            return view('users.profile');
        } else {
            abort(403, "Unauthorized Action");
        }
    }

    public function showResetPw () {
        return view('users.forgotPassword');
    }
    public function store (Request $request) {
        $request->validate([
            'email' => ['required', 'email'], 
        ]);


        $resetEmail = DB::table('users')->where('email', '=', $request->email)->get();
        if(count($resetEmail) == 1) {
            // If the user login with Oauth previously with alert them then redirect back
            if ($resetEmail[0]->provider != null) {
                return back()->withErrors(['email' => 'Unable to reset this email, You previously login with ' . $resetEmail[0]->provider]);
            };
        };

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }

    public function createNewPassword (Request $request) {
        

        return view('users.resetPassword', [
            'request' => $request,
        ]);
    }

    public function resetPassword (Request $request) {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }

    public function updatedPassword (Request $request) {
        $formValue = $request->validate([
            'password' => ['required'],
            'email' => ['required'],
        ]);

        if (auth()->attempt($formValue)) {
            // return back()->with('')
            return redirect('/user/reset/password')->with('resetPassword', Auth::user()->email);
        }
        return back()->withErrors([
            'password' => 'Incorrect password',
        ]);
    }

}
