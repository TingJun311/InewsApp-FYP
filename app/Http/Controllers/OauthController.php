<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{
    public function loginWithGoogle () {
        return Socialite::driver('google')->redirect();
    }
    public function callBackGoogle () {
        try {
            $user = Socialite::driver('google')->user();
            $find = User::query()->where('provider_id', $user->id)->first();

            if ($find) {
                Auth::login($find);
                return redirect('/');
            } else {
                $new = User::query()->create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'provider' => 'google',
                    'provider_id' => $user->id,
                    'lang' => 'en'
                ]);

                Auth::login($new);

                return redirect('/');
            }
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect('/')->withErrors('OauthFailed', 'Login error try again later');
        }
    }
}
